<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\IPermissionGroupRepository;
use App\Models\PermissionGroup;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class PermissionGroupRepository extends BaseRepository implements IPermissionGroupRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PermissionGroup::class;
    }
}
