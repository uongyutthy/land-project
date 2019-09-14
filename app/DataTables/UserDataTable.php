<?php


namespace App\DataTables;


use App\Contracts\Repositories\IUserRepository;
use App\Models\BaseModel;

class UserDataTable extends DataTable
{
    private $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function dataSource()
    {
        return $this->userRepository->model()::where(BaseModel::RECORD_STATUS_ID, BaseModel::RECORD_STATUS_ACTIVE);
    }

    public function columns()
    {
        return [
            [
                'data' => 'name',
                'name' => 'name',
                'title' => __('user.name')
            ],
            [
                'data' => 'username',
                'name' => 'username',
                'title' => __('user.username')
            ],
            [
                'data' => 'email',
                'name' => 'email',
                'title' => __('user.email')
            ]
        ];
    }

    public function actions()
    {
        return [
            'view' => false,
            'edit' => [
                'permission' => 'edit-user',
                'route' => [
                    'name' => 'users.edit',
                    'parameters' => 'id'
                ]
            ],
            'delete' => [
                'permission' => 'delete-user',
                'route' => [
                    'name' => 'users.destroy',
                    'parameters' => 'id'
                ]
            ]
        ];
    }
}