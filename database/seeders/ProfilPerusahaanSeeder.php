<?php
namespace Database\Seeders;

use App\Models\ProfilPerusahaan;
use Illuminate\Database\Seeder;

class ProfilPerusahaanSeeder extends Seeder
{
    public function run()
    {
        ProfilPerusahaan::create([
            'kata_pengantar'   => 'PT. Siwalan Teknik Perkasa adalah perusahaan jasa angkutan batu kapur yang berdiri sejak 28 Maret 2000. Kami telah menjadi mitra logistik pertambangan terpercaya selama lebih dari dua dekade. Fokus kami adalah mendukung kebutuhan transportasi sektor industri, konstruksi, dan pengolahan mineral di wilayah Jawa Timur dan sekitarnya melalui layanan profesional, efisien, dan tepat waktu.',
            'tanggal_berdiri'  => '2000-03-28',
            'direktur_utama'   => 'Linda Pujianto',
            'nomor_izin_usaha' => '9120403841766',
            'alamat_kantor'    => 'Jl. Raya Semarang–Tuban KM 35, Paloh, Bancar, Kabupaten Tuban, Jawa Timur',
        ]);
    }
}
