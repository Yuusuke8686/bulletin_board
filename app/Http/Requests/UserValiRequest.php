<?php

namespace App\Http\Requests;

use App\Rules\AluphaNumHalf;
use Illuminate\Foundation\Http\FormRequest;

class UserValiRequest extends FormRequest
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
            'login_id' => ['required', new AluphaNumHalf, 'max:12', 'unique:admins,login_id'],
            'password' => ['required', new AluphaNumHalf, 'between:8,12'],
            'nickname' => 'required | max:12'
        ];
    }
}
