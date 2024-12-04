<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use App\Models\Risiko;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function index()
    {
        $rekomendasies = Rekomendasi::all();
        return view('rekomendasi.index', compact('rekomendasies'));
    }

    public function create()
    {
        $risikos = Risiko::all();
        return view('rekomendasi.create', compact('risikos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'risiko_id' => 'required',
        ]);

        Rekomendasi::create($request->all());

        return redirect()->route('rekomendasi.index')->with('status', 'Rekomendasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);
        $risikos = Risiko::all();
        return view('rekomendasi.edit', compact('rekomendasi', 'risikos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'risiko_id' => 'required',
        ]);

        $rekomendasi = Rekomendasi::findOrFail($id);
        $rekomendasi->update($request->all());

        return redirect()->route('rekomendasi.index')->with('status', 'Rekomendasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);
        $rekomendasi->delete();

        return redirect()->route('rekomendasi.index')->with('status', 'Rekomendasi berhasil dihapus');
    }
}

