<?php

namespace App\Http\Requests;

use App\Models\BaseModel;
use Illuminate\Validation\Rule;

class UserCreateRequest extends BaseCreateRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users')->where(BaseModel::RECORD_STATUS_ID, BaseModel::RECORD_STATUS_ACTIVE)
            ],
            'email' => [
                'nullable',
                'email',
                Rule::unique('users')->where(BaseModel::RECORD_STATUS_ID, BaseModel::RECORD_STATUS_ACTIVE)
            ],
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'profile_picture_file' => 'nullable|file',
            'roles' => 'nullable|array',
            'roles.*' => 'required'
        ];
    }
}
