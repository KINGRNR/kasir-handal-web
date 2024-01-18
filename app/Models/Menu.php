<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'menu_id';
    protected $guarded = [];

    const CREATED_AT = 'menu_created_at';
    const UPDATED_AT = 'menu_updated_at';
    public static function getRoleMenus($userId)
    {   
        return DB::table('v_role_menus')
            ->where(['menu_active' => 1, 'user_id' => $userId])
            ->orderBy('menu_order')->get();
    }
    public static function generateMenuId(int $length = 16): string
    {
        $menu_id = Str::random($length);//Generate random string
        $exists = DB::table('menus')
            ->where('menu_id', '=', $menu_id)
            ->get(['menu_id']);//Find matches for id = generated id
        if (isset($exists[0]->menu_id)) {//id exists in users table
            return self::generateMenuId();//Retry with another generated id
        }

        return $menu_id;//Return the generated id as it does not exist in the DB
    }
}