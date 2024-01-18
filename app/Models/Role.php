<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Malico\LaravelNanoid\Eloquent\InteractsWithNanoid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class Role extends Model
{
    protected $table        = 'roles';
    protected $primaryKey   = 'role_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'role_id', 'role_code', 'role_name'
    ];
}
