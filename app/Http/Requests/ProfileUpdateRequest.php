<?php

namespace App\Http\Requests;

use App\Models\BaseModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends BaseUpdateRequest
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
            'email' => [
                'nullable',
                'email',
                Rule::unique('users')->where(BaseModel::RECORD_STATUS_ID, BaseModel::RECORD_STATUS_ACTIVE)->ignore(Auth::id())
            ],
            'new_password' => 'nullable|confirmed',
            'new_password_confirmation' => 'required_with:new_password',
            'profile_picture_file' => 'nullable|file'
        ];
    }
}
