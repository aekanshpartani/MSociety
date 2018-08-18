<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestsCreateRequest extends FormRequest
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
            'name'=>'required|regex:/^[a-zA-Z]+$/u|max:255|min:3',
            'owner_id'=>'required',
            'phone_no'=>'',
            'reason'=>'required|regex:/^[a-zA-Z]+$/u|max:255|min:3'
        ];
    }
}
