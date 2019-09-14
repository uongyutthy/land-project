<?php

namespace App\Models\Security;

use App\Models\BaseModel;

class Menu extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable     = ['title','url','icon','parent_id','sort_index'];
    protected $table        = 'menus';

    public function permissions(){
        return $this->hasMany(MenuPermission::class);

    }

    /**
     * Get active menu
     * @return mixed
     */
    public static function active(){
        return self::where('record_status_id', self::RECORD_STATUS_ACTIVE)->with('permissions');
    }

    /**
     * get Parent menus and active
     * @return mixed
     */
    public static function getParentMenus(){
        return self::active()->whereNull('parent_id')->orderBy("sort_index");

    }

    /**
     * Get child menu by parent id
     * @param int $parent_id
     * @return mixed
     */
    public static function getChildMenus($parent_id){
        return self::active()->where('parent_id', $parent_id)->orderBy("sort_index");
    }
}
