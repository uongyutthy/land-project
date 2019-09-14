<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class RoleUpdateRequest extends BaseUpdateRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('roles')->ignore($this->request->get('id'))
            ],
            'permissions' => 'nullable|array',
            'permissions.*' => 'numeric|min:1'
        ];
    }
}
