<?php

namespace App\Http\Controllers;

use App\Models\Masteriuran;
use App\Models\Transaksiiuran;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TransaksiiuranController extends Controller
{
    public function index()
    {
        $pembayaran = Transaksiiuran::with(['warga', 'iuran'])
            ->latest()
            ->paginate(10);

        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $warga = Warga::all();
        $iuran = Masteriuran::all();

        return view('pembayaran.create', compact('warga', 'iuran'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'warga_id'      => 'required|exists:warga,id',
            'iuran_id'      => 'required|exists:master_iuran,id',
            'bulan_tahun'   => [
                'required',
                'date_format:Y-m',
                // satu warga tidak boleh bayar iuran yang sama di bulan yang sama dua kali
                Rule::unique('transaksi_iuran')
                    ->where('warga_id', $request->warga_id)
                    ->where('iuran_id', $request->iuran_id),
            ],
            'nominal'       => 'required|numeric|min:0',
            'tanggal_bayar' => 'required_if:status,lunas|nullable|date',
            'status'        => 'required|in:lunas,belum',
        ]);

        // Nomor kwitansi otomatis, contoh: KWT-20261022-AB12CD
        $validated['no_kwitansi'] = 'KWT-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));

        Transaksiiuran::create($validated);

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran iuran berhasil ditambahkan');
    }

    public function show(Transaksiiuran $pembayaran)
    {
        $pembayaran->load(['warga', 'iuran']);

        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit(Transaksiiuran $pembayaran)
    {
        $warga = Warga::all();
        $iuran = Masteriuran::all();

        return view('pembayaran.edit', compact('pembayaran', 'warga', 'iuran'));
    }

    public function update(Request $request, Transaksiiuran $pembayaran)
    {
        $validated = $request->validate([
            'warga_id'      => 'required|exists:warga,id',
            'iuran_id'      => 'required|exists:master_iuran,id',
            'bulan_tahun'   => [
                'required',
                'date_format:Y-m',
                Rule::unique('transaksi_iuran')
                    ->where('warga_id', $request->warga_id)
                    ->where('iuran_id', $request->iuran_id)
                    ->ignore($pembayaran->id),
            ],
            'nominal'       => 'required|numeric|min:0',
            'tanggal_bayar' => 'required_if:status,lunas|nullable|date',
            'status'        => 'required|in:lunas,belum',
        ]);

        $pembayaran->update($validated);

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran iuran berhasil diperbarui');
    }

    public function destroy(Transaksiiuran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran iuran berhasil dihapus');
    }
}
