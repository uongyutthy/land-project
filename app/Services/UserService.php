<?php

namespace App\Services;

use App\Contracts\Repositories\IUserRepository;
use App\Contracts\Services\IUserService;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserService extends BaseService implements IUserService
{
    protected $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }

    public function insert(UserCreateRequest $request)
    {
        $user = null;
        DB::beginTransaction();
        try {
            $request->merge(['password' => Hash::make($request->get('password'))]);
            $request->merge(['profile_picture' => $this->uploadProfilePicture($request->file('profile_picture_file'))]);

            $user = $this->repository->create($request->toArray());
            $user->assignRole($request->get('roles'));
            DB::commit();
        } catch (\Exception $e) {
            $user = null;
            DB::rollBack();
        }

        return $user;
    }

    // update record in the database
    public function update(UserUpdateRequest $request, $id)
    {
        $user = $this->repository->find($id);
        $profile_picture_file = $request->file('profile_picture_file');

        DB::beginTransaction();
        try {
            if ($profile_picture_file) {
                Storage::disk('public_uploads')->delete($user->profile_picture);
                $request->merge(['profile_picture' => $this->uploadProfilePicture($profile_picture_file)]);
            } else if ($request->has('_remove_profile_picture')) {
                Storage::disk('public_uploads')->delete($user->profile_picture);
                $request->merge(['profile_picture' => null]);
            }

            if (!empty($request->get('password'))) {
                $request->merge(['password' => Hash::make($request->get('password'))]);
            } else {
                $request = collect($request->except('password'));
            }

            $user = $this->repository->update($request->toArray(), $id);
            $user->syncRoles($request->get('roles'));
            DB::commit();
        } catch (\Exception $e) {
            $user = null;
            DB::rollBack();
        }

        return $user;
    }

    public function updateProfile(ProfileUpdateRequest $request) {
        $user = auth()->user();
        $profile_picture_file = $request->file('profile_picture_file');

        DB::beginTransaction();
        try {
            if ($profile_picture_file) {
                Storage::disk('public_uploads')->delete($user->profile_picture);
                $request->merge(['profile_picture' => $this->uploadProfilePicture($profile_picture_file)]);
            } else if ($request->has('_remove_profile_picture')) {
                Storage::disk('public_uploads')->delete($user->profile_picture);
                $request->merge(['profile_picture' => null]);
            }

            if (!empty($request->get('new_password'))) {
                $request->merge(['password' => Hash::make($request->get('new_password'))]);
            } else {
                $request = collect($request->except('password'));
            }

            $request = collect($request->except('username'));
            $user = $this->repository->update($request->toArray(), $user->id);
            DB::commit();
        } catch (\Exception $e) {
            $user = null;
            DB::rollBack();
        }

        return $user;
    }

    protected function repository()
    {
        return $this->repository;
    }

    public function all()
    {
        return $this->repository->findWhere(['record_status_id' => BaseModel::RECORD_STATUS_ACTIVE]);
    }

    public function delete($id)
    {
        return $this->repository->update([BaseModel::RECORD_STATUS_ID => BaseModel::RECORD_STATUS_DELETE ], $id);
    }

    /**
     * Upload profile picture
     *
     * @param $file
     * @return string|null
     */
    private function uploadProfilePicture($file) {
        if ($file) {
            $path = $file->store('profile_pictures', 'public_uploads');
            $fullPath = public_path('uploads/'.$path);
            $file = Image::make($fullPath)->resize(150, 150);
            $file->save();
            return $path;
        }

        return NULL;
    }
}