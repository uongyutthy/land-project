<?php


namespace App\Services;


use App\Contracts\Repositories\IRoleRepository;
use App\Contracts\Services\IRoleService;
use App\Models\BaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleService extends BaseService implements IRoleService
{
    protected $repository;

    public function __construct(IRoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(Request $request)
    {
        $role = null;
        DB::beginTransaction();
        try {
            $role = $this->repository->create($request->only(['name', 'description', 'guard_name']));
            $role->syncPermissions($request->get('permissions'));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $role = null;
        }
        return $role;
    }

    public function update(Request $request, $id)
    {
        $role = null;
        DB::beginTransaction();
        try {
            $role = $this->repository->update($request->only(['name', 'description', 'guard_name']), $id);
            $role->syncPermissions($request->get('permissions'));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $role = null;
        }

        return $role;
    }

    public function delete($id)
    {
        $role = $this->repository->find($id);

        DB::beginTransaction();
        try {
            $deleted = $this->repository->delete($id);
            $role->syncPermissions([]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $deleted = false;
        }

        return $deleted;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }
}