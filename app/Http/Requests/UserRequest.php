<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules()
    {
        return [
            'txtUser' => 'required|min:3|max:50',
            'txtPass' => 'required|min:3|max:50',
            'txtRePass' => 'required|min:3|max:50|same:txtPass',
            'txtEmail' => 'required|min:3|max:50'
        ];
    }
}
