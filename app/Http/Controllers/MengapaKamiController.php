<?php
namespace App\Http\Controllers;

use App\Models\MengapaKami;
use Illuminate\Http\Request;

class MengapaKamiController extends Controller
{
    // Mengembalikan View HTML untuk Admin Panel
    public function index()
    {
        $items = \App\Models\MengapaKami::all();
        return view('admin.mengapa-kami.index', compact('items'));
    }

                               // Mengembalikan JSON untuk API (daftar semua alasan "Mengapa Kami")
    public function apiIndex() // <-- Metode baru untuk API GET semua alasan

    {
        $items = MengapaKami::all();
        return response()->json($items);
    }

    // Mengupdate alasan (untuk Admin Panel)
    public function update(Request $request, $id)
    {
        $item = \App\Models\MengapaKami::findOrFail($id);
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $item->update($data);

        return redirect()->route('admin.mengapa-kami.index')->with('success', 'Berhasil diperbarui.');
    }

    // Menonaktifkan fitur tambah data baru (mengembalikan JSON 403)
    public function store()
    {
        return response()->json([
            'message' => 'Menambah data tidak diperbolehkan.',
        ], 403);
    }

    // Menonaktifkan fitur hapus data (mengembalikan JSON 403)
    public function destroy($id)
    {
        return response()->json([
            'message' => 'Menghapus data tidak diperbolehkan.',
        ], 403);
    }
}
