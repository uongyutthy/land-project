<?php

namespace App\Http\Requests;

class RoleCreateRequest extends BaseCreateRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'numeric|min:1'
        ];
    }
}
