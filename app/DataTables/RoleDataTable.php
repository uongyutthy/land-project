<?php
namespace App\DataTables;


use App\Contracts\Repositories\IRoleRepository;

class RoleDataTable extends DataTable
{
    private $roleRepository;

    public function __construct(IRoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function dataSource()
    {
        return $this->roleRepository->all();
    }

    public function columns()
    {
        return [
            [
                'data' => 'name',
                'name' => 'name',
                'title' => __('role.name')
            ],
            [
                'data' => 'description',
                'name' => 'description',
                'title' => __('role.description')
            ]
        ];
    }

    public function actions()
    {
        return [
            'view' => false,
            'edit' => [
                'permission' => 'edit-role',
                'route' => [
                    'name' => 'roles.edit',
                    'parameters' => 'id'
                ]
            ],
            'delete' => [
                'permission' => 'delete-role',
                'route' => [
                    'name' => 'roles.destroy',
                    'parameters' => 'id'
                ]
            ]
        ];
    }
}