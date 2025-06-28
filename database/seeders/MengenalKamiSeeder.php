<?php
namespace Database\Seeders;

use App\Models\MengenalKami;
use Illuminate\Database\Seeder;

class MengenalKamiSeeder extends Seeder
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
                'title'       => 'Pengalaman 20+ Tahun',
                'description' => 'Rekam jejak terbukti dalam melayani industri tambang.',
            ],
            [
                'title'       => 'Armada Modern & Terawat',
                'description' => 'Menjamin efisiensi dan keamanan operasional pengangkutan.',
            ],
            [
                'title'       => 'Tim Profesional',
                'description' => 'Sumber daya manusia yang kompeten dan berdedikasi tinggi.',
            ],
            [
                'title'       => 'Prioritas Keselamatan',
                'description' => 'Komitmen terhadap standar keamanan operasional yang ketat.',
            ],
        ];

        foreach ($data as $item) {
            MengenalKami::create($item);
        }
    }
}
