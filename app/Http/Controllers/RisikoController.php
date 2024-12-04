<?php

namespace App\Http\Controllers;

use App\Models\Risiko;
use Illuminate\Http\Request;

class RisikoController extends Controller
{
    public function index()
    {
        $risikos = Risiko::all(); // Mengambil semua data risiko dari database
        return view('kelola', compact('risikos')); // Mengirimkan data ke view kelola.blade.php
    }

    public function create()
    {
        return view('risiko.create'); // Menampilkan form untuk menambahkan risiko baru
    }

    public function edit($id)
{
    $risiko = Risiko::findOrFail($id); // Mencari risiko berdasarkan ID
    return view('risiko.edit', compact('risiko')); // Mengirimkan data risiko ke view
}

public function update(Request $request, $id)
{
    // Validasi data yang dikirimkan
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'severity' => 'required|integer',
        'occurrence' => 'required|integer',
        'detection' => 'required|integer',
        'rpn' => 'required|integer',
    ]);

    // Temukan risiko berdasarkan ID dan perbarui
    $risiko = Risiko::findOrFail($id);
    $risiko->update($validatedData);

    return redirect()->route('kelola')->with('status', 'Risiko berhasil diperbarui!');
}



    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'severity' => 'required|integer',
            'occurrence' => 'required|integer',
            'detection' => 'required|integer',
            'rpn' => 'required|integer',
        ]);

        // Menyimpan data risiko baru
        Risiko::create($validatedData);

        return redirect()->route('kelola')->with('status', 'Risiko berhasil ditambahkan!');
    }

    public function destroy($id)
{
    // Temukan risiko berdasarkan ID dan hapus
    $risiko = Risiko::findOrFail($id);
    $risiko->delete();

    return redirect()->route('kelola')->with('status', 'Risiko berhasil dihapus!');
}


    // Metode lainnya (edit, update, destroy)
}
