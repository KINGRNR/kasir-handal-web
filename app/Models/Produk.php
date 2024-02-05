<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes;

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
    const DELETED_AT = 'produk_deleted_at';

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_produk_kategori');
    }
}
