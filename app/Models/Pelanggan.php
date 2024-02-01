<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Malico\LaravelNanoid\Eloquent\InteractsWithNanoid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Pelanggan extends Model
{
    use HasFactory;
    //use InteractsWithNanoid;
    protected $table         = 'pelanggan';
    protected $primaryKey = 'pelanggan_id';
    public $incrementing = false;

    protected $nanoidLength = 16;

    protected $fillable = ['pelanggan_id','nama_pelanggan', 'no_hp', 'email_pelanggan', 'alamat_pelanggan'];

    const CREATED_AT = 'pelanggan_created_at';
    const UPDATED_AT = 'pelanggan_updated_at';
    const DELETED_AT = 'pelanggan_deleted_at';


//    protected static function boot(): void
//    {
//        parent::boot();
//
//        static::creating(function (self $model): void {
//            $model->{$model->getKeyName()} = $model->generateNanoid();
//        });
//    }

}
