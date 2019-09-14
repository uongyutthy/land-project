<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class GroupProfileMenuPrivilege extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable     = ['group_profile_id','menu_id','privilege_id'];
    protected $table        = 'group_profiles_menus_privileges';
}
