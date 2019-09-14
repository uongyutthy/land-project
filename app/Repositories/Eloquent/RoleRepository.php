<?php


namespace App\Repositories\Eloquent;


use App\Contracts\Repositories\IRoleRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements IRoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

}