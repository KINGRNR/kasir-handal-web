<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Toko extends Model
{
    protected $table         = 'toko';
    protected $primaryKey    = 'toko_id';
    // protected $useAutoIncrement = false;
    // public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'toko_id',
        'toko_user_id',
        'toko_nama',
        'toko_midtrans_serverkey',
        'toko_midtrans_clientkey',
        'toko_foto'
    ];
    protected $dates = [];

    // const CREATED_AT = 'produk_created_at';
    // const UPDATED_AT = 'produk_updated_at';
    // const DELETED_AT = 'produk_deleted_at';

}
