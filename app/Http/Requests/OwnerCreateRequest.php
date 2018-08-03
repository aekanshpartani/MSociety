<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerCreateRequest extends FormRequest
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
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|unique:users',
            'phone_no'=>'required|unique:owners',
            'flat_no'=>'required',
            'society_id'=>'required',
            'password'=>'required|min:8',
            'confirm_password'=> 'required_with:password|same:password|min:8',
        ];
    }
}
