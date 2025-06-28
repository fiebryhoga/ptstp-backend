<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MengenalKami extends Model
{
    use HasFactory;

    protected $table = 'mengenal_kamis';

    protected $fillable = [
        'title',
        'description',
    ];
}
