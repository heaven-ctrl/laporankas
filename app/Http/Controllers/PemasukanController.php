<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukans = Pemasukan::latest()->get();

        return view('pemasukan.index', compact('pemasukans'));
    }

    public function create()
    {
        return view('pemasukan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'sumber' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'nominal' => 'required|numeric|min:0',
        ]);

        Pemasukan::create($request->all());

        return redirect()
            ->route('pemasukan.index')
            ->with('success', 'Pemasukan berhasil ditambahkan.');
    }

    public function edit(Pemasukan $pemasukan)
    {
        return view('pemasukan.edit', compact('pemasukan'));
    }

    public function update(Request $request, Pemasukan $pemasukan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'sumber' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'nominal' => 'required|numeric|min:0',
        ]);

        $pemasukan->update($request->all());

        return redirect()
            ->route('pemasukan.index')
            ->with('success', 'Pemasukan berhasil diperbarui.');
    }

    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return redirect()
            ->route('pemasukan.index')
            ->with('success', 'Pemasukan berhasil dihapus.');
    }
}
