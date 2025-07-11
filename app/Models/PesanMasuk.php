<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanMasuk extends Model
{
    use HasFactory;

    protected $table = 'pesan_masuks';

    protected $fillable = [
        'nama',
        'perusahaan',
        'email',
        'subjek',
        'pesan',
    ];
}
