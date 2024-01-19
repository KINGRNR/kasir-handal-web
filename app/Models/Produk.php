<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table         = 'produk';
    protected $primaryKey    = 'id_produk';
    protected $useAutoIncrement = false;
    public $incrementing = false;

    protected $fillable = [
        'id_produk_kategori',
        'nama_produk',
        'harga_produk',
        'stok_produk',
        'foto_produk'
    ];
    const CREATED_AT = 'produk_created_at';
    const UPDATED_AT = 'produk_updated_at';
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_produk_kategori');
    }
}
