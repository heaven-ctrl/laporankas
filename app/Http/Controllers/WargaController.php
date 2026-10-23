<?php

namespace App\Http\Controllers;

use App\Models\Transaksiiuran;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $warga = Warga::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('nik', 'like', "%{$search}%")
                      ->orWhere('no_rumah', 'like', "%{$search}%");
            })
            ->orderBy('nama')
            ->paginate(10)
            ->withQueryString();

        return view('warga.index', compact('warga'));
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik'           => 'required|digits:16|unique:warga,nik',
            'nama'          => 'required|string|max:100',
            'no_rumah'      => 'required|string|max:20',
            'no_hp'         => 'nullable|string|max:20',
            'status_hunian' => 'required|in:tetap,kontrak,kos',
            'status_aktif'  => 'required|in:aktif,nonaktif',
        ]);

        Warga::create($validated);

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan');
    }

    public function show(Warga $warga)
    {
        $warga->load('pembayaran.iuran');

        return view('warga.show', compact('warga'));
    }

    public function edit(Warga $warga)
    {
        return view('warga.edit', compact('warga'));
    }

    public function update(Request $request, Warga $warga)
    {
        $validated = $request->validate([
            'nik'           => 'required|digits:16|unique:warga,nik,' . $warga->id,
            'nama'          => 'required|string|max:100',
            'no_rumah'      => 'required|string|max:20',
            'no_hp'         => 'nullable|string|max:20',
            'status_hunian' => 'required|in:tetap,kontrak,kos',
            'status_aktif'  => 'required|in:aktif,nonaktif',
        ]);

        $warga->update($validated);

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil diperbarui');
    }

    public function destroy(Warga $warga)
    {
        if (Transaksiiuran::where('warga_id', $warga->id)->exists()) {
            return redirect()->route('warga.index')
                ->with('error', 'Warga sudah punya riwayat pembayaran. Ubah status menjadi nonaktif saja.');
        }

        $warga->delete();

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus');
    }
}
