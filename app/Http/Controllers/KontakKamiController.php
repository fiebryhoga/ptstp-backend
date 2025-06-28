<?php
namespace App\Http\Controllers;

use App\Models\KontakKami;
use Illuminate\Http\Request;

class KontakKamiController extends Controller
{
    public function show()
    {
        $kontak = KontakKami::first();
        return response()->json($kontak);
    }

    public function index()
    {
        $kontak = KontakKami::first();
        return view('admin.kontak-kami.index', compact('kontak'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'alamat_kantor' => 'required|string',
        'email'         => 'required|email',
        'telepon'       => 'required|string|max:20',
    ]);

    $kontak = \App\Models\KontakKami::findOrFail($id);
    $kontak->update($request->only(['alamat_kantor', 'email', 'telepon']));

    return back()->with('success', 'Kontak berhasil diperbarui.');
}
}