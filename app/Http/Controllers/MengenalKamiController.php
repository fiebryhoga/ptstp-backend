<?php
namespace App\Http\Controllers;

use App\Models\MengenalKami;
use Illuminate\Http\Request;

class MengenalKamiController extends Controller
{
    /**
     * Menampilkan seluruh entri (4 data) untuk Admin Panel (View HTML).
     */
    public function index()
    {
        $items = \App\Models\MengenalKami::all();
        return view('admin.mengenal-kami.index', compact('items'));
    }

    /**
     * Menampilkan seluruh entri (4 data) untuk API (JSON).
     */
    public function apiIndex() // <-- Metode baru untuk API GET semua entri

    {
        $items = MengenalKami::all();
        return response()->json($items);
    }

    /**
     * Update salah satu entri berdasarkan ID (untuk Admin Panel).
     */
    public function update(Request $request, $id)
    {
        $item = MengenalKami::findOrFail($id);
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $item->update($data);

        return redirect()->route('admin.mengenal-kami.index')->with('success', 'Berhasil diperbarui.');
    }

    /**
     * Menonaktifkan fitur tambah data baru (mengembalikan JSON 403).
     */
    public function store()
    {
        return response()->json([
            'message' => 'Menambah data tidak diperbolehkan. Data hanya bisa diedit.',
        ], 403);
    }

    /**
     * Menonaktifkan fitur hapus data (mengembalikan JSON 403).
     */
    public function destroy($id)
    {
        return response()->json([
            'message' => 'Menghapus data tidak diperbolehkan. Data hanya bisa diedit.',
        ], 403);
    }
}
