<?php
namespace Database\Seeders;

use App\Models\MengapaKami;
use Illuminate\Database\Seeder;

class MengapaKamiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title'       => 'Pengalaman Solid',
                'description' => 'Lebih dari 20 tahun di industri angkutan batu kapur.',
            ],
            [
                'title'       => 'Armada Handal',
                'description' => 'Truk modern, terawat, dan siap beroperasi 24/7.',
            ],
            [
                'title'       => 'Keselamatan Prioritas',
                'description' => 'Prosedur ketat dan pelatihan rutin demi keamanan operasional.',
            ],
            [
                'title'       => 'Ketepatan Waktu',
                'description' => 'Pengiriman sesuai jadwal adalah komitmen utama kami.',
            ],
            [
                'title'       => 'Tim Profesional & Berlisensi',
                'description' => 'Driver dan staf kami berpengalaman dan terlatih.',
            ],
            [
                'title'       => 'Fleksibel & Skalabel',
                'description' => 'Menyesuaikan kebutuhan logistik proyek kecil hingga besar.',
            ],
        ];

        foreach ($data as $item) {
            MengapaKami::create($item);
        }
    }
}
