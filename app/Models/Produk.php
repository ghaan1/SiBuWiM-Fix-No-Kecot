<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'kategori_id',
        'armada_id',
        'nama',
        'nama_tujuan',
        'waktu_tempuh',
        'harga',
        'stok',
        'deskripsi',
        'gambar'
    ];

    /**
     * Get the user that owns the Produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function armada()
    {
        return $this->belongsTo(Armada::class, 'armada_id');
    }
}