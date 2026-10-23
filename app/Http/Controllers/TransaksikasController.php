<?php

namespace App\Http\Controllers;

use App\Models\Transaksikas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksikasController extends Controller
{
    public function index()
    {
        $transaksi = Transaksikas::latest()->paginate(10);
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        return view('transaksi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_transaksi' => 'required|unique:transaksi_kas,no_transaksi',
            'jenis'        => 'required|in:masuk,keluar',
            'kategori_id'  => 'required|integer',
            'nominal'      => 'required|numeric|min:0',
            'tanggal'      => 'required|date',
            'keterangan'   => 'nullable|string',
            'lampiran'     => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        $validated['created_by'] = Auth::id();

        Transaksikas::create($validated);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show(Transaksikas $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksikas $transaksi)
    {
        return view('transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, Transaksikas $transaksi)
    {
        $validated = $request->validate([
            'no_transaksi' => 'required|unique:transaksi_kas,no_transaksi,' . $transaksi->id,
            'jenis'        => 'required|in:masuk,keluar',
            'kategori_id'  => 'required|integer',
            'nominal'      => 'required|numeric|min:0',
            'tanggal'      => 'required|date',
            'keterangan'   => 'nullable|string',
            'lampiran'     => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        $transaksi->update($validated);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy(Transaksikas $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}
