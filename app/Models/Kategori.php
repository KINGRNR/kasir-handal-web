<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;

    protected $table         = 'kategori';
    protected $primaryKey    = 'id_kategori';
    protected $useAutoIncrement = false;
    public $incrementing = false;

    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
        'id_kategori_toko'
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_produk_kategori');
    }
    const CREATED_AT = 'kategori_created_at';
    const UPDATED_AT = 'kategori_updated_at';
    const DELETED_AT = 'kategori_deleted_at';

}
