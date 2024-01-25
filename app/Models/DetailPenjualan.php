<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Malico\LaravelNanoid\Eloquent\InteractsWithNanoid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DetailPenjualan extends Model
{
    use HasFactory;
    //use InteractsWithNanoid;
    protected $table         = 'detail_penjualan';
    protected $primaryKey = 'detail_penjualan_id';
    public $incrementing = false;

    protected $nanoidLength = 16;

    protected $fillable = ['detail_penjualan_id','penjualan_id', 'id_barang', 'jumlah_barang', 'sub_total'];

    const CREATED_AT = 'detail_penjualan_created_at';
    const UPDATED_AT = 'detail_penjualan_updated_at';
    const DELETED_AT = 'detail_penjualan_deleted_at';

    public static function generatePenjualanId(int $length = 16): string
    {
        $penjualan_id = Str::random($length);//Generate random string
        $exists = DB::table('penjualan')
            ->where('penjualan_id', '=', $penjualan_id)
            ->get(['penjualan_id']);//Find matches for id = generated id
        if (isset($exists[0]->penjualan_id)) {//id exists in users table
            return self::generatePenjualanId();//Retry with another generated id
        }

        return $penjualan_id;//Return the generated id as it does not exist in the DB
    }

//    protected static function boot(): void
//    {
//        parent::boot();
//
//        static::creating(function (self $model): void {
//            $model->{$model->getKeyName()} = $model->generateNanoid();
//        });
//    }

}
