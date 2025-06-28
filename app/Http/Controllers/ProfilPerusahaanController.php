<?php
namespace App\Http\Controllers;

use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;

class ProfilPerusahaanController extends Controller
{
    public function index()
    {
        $profil = ProfilPerusahaan::first();
        return view('admin.profil-perusahaan.index', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kata_pengantar'  => 'required|string',
            'tanggal_berdiri' => 'required|date',
            'direktur_utama'  => 'required|string|max:255',
            'nomor_izin_usaha'      => 'required|string|max:50',
            'alamat_kantor'   => 'required|string',
        ]);

        $profil = ProfilPerusahaan::findOrFail($id);
        $profil->update($data);

        return redirect()->route('admin.profil-perusahaan.index')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }

    public function store()
    {
        return response()->json([
            'message' => 'Menambah data tidak diperbolehkan.',
        ], 403);
    }

    public function destroy($id)
    {
        return response()->json([
            'message' => 'Menghapus data tidak diperbolehkan.',
        ], 403);
    }

    // Opsional: API JSON
    public function show()
    {
        return response()->json(ProfilPerusahaan::first());
    }
}
