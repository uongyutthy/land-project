<?php

namespace App\Services;

use App\Contracts\Repositories\IPermissionGroupRepository;
use App\Contracts\Services\IPermissionGroupService;

class PermissionGroupService extends BaseService implements IPermissionGroupService {

    protected $repository;

    public function __construct(IPermissionGroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->with('permissions')->all();
    }


}