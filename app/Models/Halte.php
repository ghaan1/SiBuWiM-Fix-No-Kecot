<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halte extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id', 'nama', 'kota', 'provinsi'
    ];
}
