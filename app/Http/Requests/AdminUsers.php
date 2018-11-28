<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUsers extends FormRequest
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

        if($this->method() == 'PUT') {
            $password = 'confirmed|min:6|nullable';
        } else {
            $password = 'required|confirmed|min:6';
        }


        return [
           'name'     => 'required|min:3|unique:users,name,'.$this->get('id'),
           'fio'      => 'required',
           'email'    => 'required|string|email|max:255|unique:users,email,'.$this->get('id'),
           'phone'    => 'required',
           'password' => $password,
        ];
    }
}
