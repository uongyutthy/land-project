<?php
/**
 * Created by PhpStorm.
 * User: hangsopheak
 * Date: 2/1/19
 * Time: 11:49 PM
 */

namespace App\Contracts\Services;

use App\Http\Requests\GroupProfileCreateRequest;
use App\Http\Requests\GroupProfileUpdateRequest;

interface IGroupProfile
{
    public function all();
    public function insert(GroupProfileCreateRequest $request);
    public function update(GroupProfileUpdateRequest $request, $id);
    public function delete($id);
}