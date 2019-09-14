<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function getInputData(){

        return [
            'name' => $this->name,
            'abbreviation' => $this->abbreviation,
            'description' => $this->description,
            'created_by' => Auth::check() ? auth::user()->id:1
        ];
    
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'abbreviation' => 'required'
        ];

    }
}
