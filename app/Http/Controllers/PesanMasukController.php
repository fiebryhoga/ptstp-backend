<?php
namespace App\Http\Controllers;

use App\Models\PesanMasuk;
use Illuminate\Http\Request;

class PesanMasukController extends Controller
{
    /**
     * Menerima pesan dari form (frontend).
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'       => 'required|string|max:255',
            'perusahaan' => 'nullable|string|max:255',
            'email'      => 'required|email',
            'subjek'     => 'required|string|max:255',
            'pesan'      => 'required|string',
        ]);

        $pesan = PesanMasuk::create($data);

        return response()->json([
            'message' => 'Pesan berhasil dikirim',
            'data'    => $pesan,
        ], 201);
    }

    /**
     * Menampilkan semua pesan (untuk admin).
     */
    public function index() // <-- UBAH BAGIAN INI

    {
        $pesans = PesanMasuk::latest()->get();               // Ambil semua pesan, urutkan dari terbaru
        return view('admin.pesan.index', compact('pesans')); // Kirim ke view
    }

    /**
     * Menampilkan pesan tertentu (opsional).
     */
    public function show($id)
    {
        $pesan = PesanMasuk::findOrFail($id);
        // Untuk admin, mungkin Anda ingin menampilkan detail di view terpisah,
        // atau dalam modal di halaman index. Untuk saat ini, kita biarkan JSON
        // jika ini memang untuk API. Jika untuk view detail, Anda akan return view di sini.
        return response()->json($pesan);
    }

    /**
     * Menghapus pesan (opsional).
     */
    public function destroy($id)
    {
        $pesan = PesanMasuk::findOrFail($id);
        $pesan->delete();

        // Setelah dihapus, redirect kembali ke halaman index pesan
        return redirect()->route('admin.pesan.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
