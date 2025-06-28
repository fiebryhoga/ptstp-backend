<?php
namespace App\Http\Controllers;

use App\Models\LayananKami;
use Illuminate\Http\Request;

class LayananKamiController extends Controller
{
    // Mengembalikan View HTML untuk Admin Panel
    public function index()
    {
        $items = \App\Models\LayananKami::all();
        return view('admin.layanan-kami.index', compact('items'));
    }

    // Mengembalikan JSON untuk API (detail satu layanan)
    public function show($id)
    {
        $data = LayananKami::findOrFail($id);
        return response()->json($data);
    }

                               // Mengembalikan JSON untuk API (daftar semua layanan)
    public function apiIndex() // <-- Metode baru untuk API GET semua layanan

    {
        $items = LayananKami::all();
        return response()->json($items);
    }

    // Menyimpan layanan baru (untuk Admin Panel)
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        \App\Models\LayananKami::create($data);
        return back()->with('success', 'Layanan berhasil ditambahkan.');
    }

    // Mengupdate layanan (untuk Admin Panel)
    public function update(Request $request, $id)
    {
        $item = \App\Models\LayananKami::findOrFail($id);
        $data = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        $item->update($data);
        return back()->with('success', 'Layanan berhasil diperbarui.');
    }

    // Menghapus layanan (untuk Admin Panel)
    public function destroy($id)
    {
        $item = \App\Models\LayananKami::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Layanan berhasil dihapus.');
    }
}
