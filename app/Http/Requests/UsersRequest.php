<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        if($this->request->get('role_id') == 1){
            return [
                'name'=>'required|min:3|max:50',
                'email'=>'required|email|unique:users',
                'role_id'=>'required',
                'is_active'=>'required',
                'password'=>'required'
            ];
        }
        elseif($this->request->get('role_id') == 2){
            return [
                'name'=>'required|min:3|max:50',
                'email'=>'required|email|unique:users',
                'role_id'=>'required',
                'phone_no'=>'required|unique:owners',
                'society_id'=>'required',
                'is_active'=>'required',
                'password'=>'required'
            ];
        }
        elseif($this->request->get('role_id') == 3){
            return [
                'name'=>'required|min:3|max:50',
                'email'=>'required|email|unique:users',
                'role_id'=>'required',
                'phone_no'=>'required|unique:owners',
                'society_id'=>'required',
                'flat_no'=>'required',
                'is_active'=>'required',
                'password'=>'required'
            ];
        }

    }
}
