<?php

namespace App\Http\Controllers;

use App\Contracts\Services\IRoleService;
use App\Contracts\Services\IUserService;
use App\DataTables\UserDataTable;
use App\Grids\UsersGridInterface;
use App\Models\BaseModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    protected $service;
    protected $roleService;

    public function __construct(IUserService $service, IRoleService $roleService)
    {
        parent::__construct();
        $this->service = $service;
        $this->roleService = $roleService;

        $this->middleware('auth');
        $this->middleware('permission:create-user', ['only' => ['create']]);
        $this->middleware('permission:edit-user',   ['only' => ['edit']]);
        $this->middleware('permission:user-list',   ['only' => ['show', 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param UserDataTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleService->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCreateRequest $request)
    {
        $user = $this->service->insert($request);
        return response()->json([
            'status' => boolval($user),
            'message' => $user ? __('global.save_success') : __('global.save_fail'),
            'data' => $user
        ], $user ? 200 : 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->service->getById($id);
        $roles = $this->roleService->all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = $this->service->update($request, $id);
        return response()->json([
            'status' => boolval($user),
            'message' => $user ? __('global.update_success') : __('global.update_fail'),
            'data' => $user
        ], $user ? 200 : 500);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->service->delete($id);
        return response()->json([
            'message' => __($deleted ? 'global.delete_success' : 'global.delete_fail'),
            'status' => $deleted,
        ], $deleted ? 200 : 500);
    }
}
