<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'profil_perusahaans';

    protected $fillable = [
        'kata_pengantar',
        'tanggal_berdiri',
        'direktur_utama',
        'nomor_izin_usaha',
        'alamat_kantor',
    ];
}
