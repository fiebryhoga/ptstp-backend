<?php
namespace Database\Seeders;

use App\Models\KontakKami;
use Illuminate\Database\Seeder;

class KontakKamiSeeder extends Seeder
{
    public function run()
    {
        KontakKami::create([
            'alamat_kantor' => 'Jl. Raya Semarang–Tuban No. KM 35, Paloh, Bancar, Kab. Tuban',
            'email'         => 'stp.bancar@gmail.com',
            'telepon'       => '+62 812-3456-7890',
        ]);
    }
}
