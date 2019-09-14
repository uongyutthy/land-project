<?php
/**
 * Created by PhpStorm.
 * User: hangsopheak
 * Date: 2/1/19
 * Time: 11:49 PM
 */

namespace App\Contracts\Services;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

interface IUserService
{
    public function getById($id);
    public function all();
    public function insert(UserCreateRequest $request);
    public function update(UserUpdateRequest $request, $id);
    public function delete($id);
}