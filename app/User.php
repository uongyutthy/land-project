<?php

namespace App;

use App\Models\HouseBlock;
use App\Models\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const RECORD_STATUS_ID = 'record_status_id';
    const RECORD_STATUS_ACTIVE   = 1;
    const RECORD_STATUS_DELETE   = 0;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'address', 'phone', 'profile_picture', 'record_status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function active(){
        return (new static())->where(self::RECORD_STATUS_ID, self::RECORD_STATUS_ACTIVE);
    }
    public static function getAllActive(){
        return (new static)->active()->get();
    }
    public function staff()
    {
        return $this->hasMany('App\Models\Staff', 'user_id', 'id')->getAllActive();
    }

    public function createdHouseBlock(){
        return $this->hasMany(HouseBlock::class, 'created_by', 'id');
    }
    
    public function updatedHouseBlock(){
        return $this->hasMany(HouseBlock::class, 'updated_by', 'id');
    }

    public function requests()
    {
        return $this->hasMany(Request::class, 'from_user_id', 'id');
    }

    public function checkRequests()
    {
        return $this->hasMany(Request::class, 'checked_by', 'id');
    }
}
