<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MengapaKami extends Model
{
    use HasFactory;

    protected $table = 'mengapa_kamis';

    protected $fillable = ['title', 'description'];
}
