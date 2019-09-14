<?php

namespace App\Http\Controllers;

use App\Contracts\Services\IPermissionGroupService;
use App\Contracts\Services\IRoleService;
use App\DataTables\PoDataTable;
use App\DataTables\RoleDataTable;
use App\Grids\RolesGridInterface;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $permissionGroupService;
    private $roleService;

    public function __construct(IPermissionGroupService $permissionGroupService, IRoleService $roleService)
    {
        parent::__construct();
        $this->permissionGroupService = $permissionGroupService;
        $this->roleService = $roleService;

        $this->middleware('auth');
        $this->middleware('permission:create-role', ['only' => ['create']]);
        $this->middleware('permission:edit-role',   ['only' => ['edit']]);
        $this->middleware('permission:role-list',   ['only' => ['show', 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param RoleDataTable $roleDataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionGroups = $this->permissionGroupService->all();
        return view('role.create', compact('permissionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $role = $this->roleService->insert($request);
        return response()->json([
            'status' => boolval($role),
            'message' => __($role ? 'global.save_success' : 'global.save_fail'),
            'data' => $role
        ], $role ? 200 : 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->roleService->getById($id);
        $assignedPermissions = $role->permissions->map(function ($item) { return $item->id; })->toArray();
        $permissionGroups = $this->permissionGroupService->all();
        return view('role.edit', compact('permissionGroups', 'role', 'assignedPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $role = $this->roleService->update($request, $id);
        return response()->json([
            'status' => boolval($role),
            'message' => __($role ? 'global.update_success' : 'global.update_fail'),
            'data' => $role
        ], $role ? 200 : 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->roleService->delete($id);
        return response()->json([
            'message' => __($deleted ? 'global.delete_success' : 'global.delete_fail'),
            'status' => $deleted
        ], $deleted ? 200 : 500);
    }
}
