<?php

namespace App\Http\Controllers;

use App\Models\StatusTindakan;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Tampilkan daftar semua status tindakan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua data status tindakan dari database
        $statuses = StatusTindakan::all();
        return view('status.index', compact('statuses'));
    }

    /**
     * Tampilkan form untuk membuat status tindakan baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Ambil semua rekomendasi yang ada di database
        $rekomendasis = Rekomendasi::all();

        // Kirim data rekomendasi ke view
        return view('status.create', compact('rekomendasis'));
    }

    /**
     * Simpan status tindakan yang baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'status' => 'required|string',
            'deskripsi' => 'required|string',
            'rekomendasi_id' => 'nullable|exists:rekomendasis,id',  // Validasi rekomendasi yang ada
        ]);

        // Simpan data status tindakan
        StatusTindakan::create([
            'nama_tindakan' => $request->nama_tindakan,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'rekomendasi_id' => $request->rekomendasi_id,  // Menyimpan ID rekomendasi jika ada
        ]);

        // Redirect ke halaman status dengan pesan sukses
        return redirect()->route('status.index')->with('success', 'Status Tindakan berhasil ditambahkan!');
    }

    /**
     * Tampilkan form untuk mengedit status tindakan.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Ambil status yang akan diedit berdasarkan ID
        $status = StatusTindakan::findOrFail($id);
        $rekomendasis = Rekomendasi::all();  // Ambil semua rekomendasi
        return view('status.edit', compact('status', 'rekomendasis'));
    }

    /**
     * Perbarui status tindakan yang ada.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validasi data dari form
        $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'status' => 'required|string',
            'deskripsi' => 'required|string',
            'rekomendasi_id' => 'nullable|exists:rekomendasis,id',  // Validasi rekomendasi yang ada
        ]);

        // Temukan status berdasarkan ID
        $status = StatusTindakan::findOrFail($id);

        // Perbarui data status tindakan
        $status->update([
            'nama_tindakan' => $request->nama_tindakan,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'rekomendasi_id' => $request->rekomendasi_id,  // Menyimpan ID rekomendasi jika ada
        ]);

        // Redirect ke halaman status dengan pesan sukses
        return redirect()->route('status.index')->with('success', 'Status Tindakan berhasil diperbarui!');
    }

    /**
     * Hapus status tindakan yang ada.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Temukan dan hapus status berdasarkan ID
        $status = StatusTindakan::findOrFail($id);
        $status->delete();

        // Redirect ke halaman status dengan pesan sukses
        return redirect()->route('status.index')->with('success', 'Status Tindakan berhasil dihapus!');
    }
}
