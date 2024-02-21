<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Malico\LaravelNanoid\Eloquent\InteractsWithNanoid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Penjualan extends Model
{
    use HasFactory;
    //use InteractsWithNanoid;
    protected $table         = 'penjualan';
    protected $primaryKey = 'penjualan_id';
    public $incrementing = false;

    protected $nanoidLength = 16;

    protected $fillable = ['penjualan_id','penjualan_pelanggan_id', 'penjualan_toko_id','penjualan_petugas_id', 'penjualan_total_harga', 'penjualan_status', 'penjualan_payment_method'];

    const CREATED_AT = 'penjualan_created_at';
    const UPDATED_AT = 'penjualan_updated_at';
    const DELETED_AT = 'penjualan_deleted_at';


//    protected static function boot(): void
//    {
//        parent::boot();
//
//        static::creating(function (self $model): void {
//            $model->{$model->getKeyName()} = $model->generateNanoid();
//        });
//    }

}
