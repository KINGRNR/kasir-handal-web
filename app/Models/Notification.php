<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Malico\LaravelNanoid\Eloquent\InteractsWithNanoid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Notification extends Model
{
    use HasFactory;
    //use InteractsWithNanoid;
    protected $table = 'notification';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $primaryKey = 'notification_id';

    protected $fillable = ['notification_id','notification_title', 'notification_message', 'notification_by', 'notification_created_at', 'notification_jenis', 'notification_to', 'notification_read', 'notification_reason'];
    const CREATED_AT = 'notification_created_at';
    const UPDATED_AT = 'notification_created_at';

}