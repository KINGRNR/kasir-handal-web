<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Configuration extends Model
{
    protected $table         = 'configurations';
    protected $primaryKey    = 'config_id';
    protected $useAutoIncrement = false;
    public $incrementing = false;
    
    protected $fillable = [
        'config_id',
        'config_code',
        'config_title',
        'config_value',
        'config_info',
        'config_group',
        'config_type',
        'config_active',
        'config_order'
    ];
    public $timestamps = false;
}
