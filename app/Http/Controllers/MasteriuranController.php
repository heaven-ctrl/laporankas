<?php

namespace App\Http\Controllers;

use App\Models\Masteriuran;
use Illuminate\Http\Request;

class MasteriuranController extends Controller
{
    public function index()
    {
        $iuran = Masteriuran::latest()->paginate(10);
        return view('iuran.index', compact('iuran'));
    }

    public function create()
    {
        return view('iuran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_iuran'      => 'required|string|max:100|unique:master_iuran,nama_iuran',
            'nominal_default' => 'required|numeric|min:0',
            'tipe_periode'    => 'required|in:bulanan,tahunan,sekali',
        ]);

        Masteriuran::create($validated);

        return redirect()->route('iuran.index')
            ->with('success', 'Master iuran berhasil ditambahkan');
    }

    public function show(Masteriuran $iuran)
    {
        return view('iuran.show', compact('iuran'));
    }

    public function edit(Masteriuran $iuran)
    {
        return view('iuran.edit', compact('iuran'));
    }

    public function update(Request $request, Masteriuran $iuran)
    {
        $validated = $request->validate([
            'nama_iuran'      => 'required|string|max:100|unique:master_iuran,nama_iuran,' . $iuran->id,
            'nominal_default' => 'required|numeric|min:0',
            'tipe_periode'    => 'required|in:bulanan,tahunan,sekali',
        ]);

        $iuran->update($validated);

        return redirect()->route('iuran.index')
            ->with('success', 'Master iuran berhasil diperbarui');
    }

    public function destroy(Masteriuran $iuran)
    {
        $iuran->delete();

        return redirect()->route('iuran.index')
            ->with('success', 'Master iuran berhasil dihapus');
    }
}
