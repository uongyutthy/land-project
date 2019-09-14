<?php

namespace App\Models\Security;

use App\Models\BaseModel;

class MenuPermission extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable     = ['menu_id','permission_name'];
    protected $table        = 'menu_permissions';

}
