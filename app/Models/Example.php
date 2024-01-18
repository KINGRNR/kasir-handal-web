<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Malico\LaravelNanoid\Eloquent\InteractsWithNanoid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Example extends Model
{
    use HasFactory;
    //use InteractsWithNanoid;

    protected $primaryKey = 'example_id';
    public $incrementing = false;

    protected $nanoidLength = 16;

    protected $fillable = ['example_id','example_code', 'example_name', 'example_active'];

    const CREATED_AT = 'example_created_at';
    const UPDATED_AT = 'example_updated_at';

    public static function generateExampleid(int $length = 16): string
    {
        $example_id = Str::random($length);//Generate random string
        $exists = DB::table('examples')
            ->where('example_id', '=', $example_id)
            ->get(['example_id']);//Find matches for id = generated id
        if (isset($exists[0]->example_id)) {//id exists in users table
            return self::generateExampleid();//Retry with another generated id
        }

        return $example_id;//Return the generated id as it does not exist in the DB
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
