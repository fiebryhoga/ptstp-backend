<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakKami extends Model
{
    use HasFactory;

    protected $table = 'kontak_kamis';

    protected $fillable = [
        'alamat_kantor',
        'email',
        'telepon',
    ];
}
