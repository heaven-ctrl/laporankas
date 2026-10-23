<?php

namespace App\Http\Controllers;

use App\Models\Kategorikas;
use App\Models\Transaksikas;
use Illuminate\Http\Request;

class KategorikasController extends Controller
{
    public function index()
    {
        $kategori = Kategorikas::latest()->paginate(10);
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
    'nama_kategori' => 'required|string|max:100|unique:kategori_kas,nama_kategori',
    'jenis'=> 'required|in:masuk,keluar',
    ]);
       
        Kategorikas::create($validated);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function show(Kategorikas $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit(Kategorikas $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategorikas $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori_kas,nama_kategori,' . $kategori->id,
            'jenis'         => 'required|in:masuk,keluar',
        ]);

        $kategori->update($validated);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(Kategorikas $kategori)
    {
        if (Transaksikas::where('kategori_id', $kategori->id)->exists()) {
            return redirect()->route('kategori.index')
                ->with('error', 'Kategori masih dipakai transaksi, tidak bisa dihapus');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}