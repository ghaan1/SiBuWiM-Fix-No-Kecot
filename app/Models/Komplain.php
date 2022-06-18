<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',' user_id', 'judul', 'isi', 'jenis_komplain'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
