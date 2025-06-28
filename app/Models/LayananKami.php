<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananKami extends Model
{
    use HasFactory;

    protected $table = 'layanan_kamis';

    protected $fillable = ['nama', 'deskripsi', 'gambar'];
}
