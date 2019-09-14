<?php


namespace App\Contracts\Services;


use Illuminate\Http\Request;

interface IRoleService
{
    public function all();
    public function insert(Request $request);
    public function update(Request $request, $id);
    public function delete($id);
    public function getById($id);
}