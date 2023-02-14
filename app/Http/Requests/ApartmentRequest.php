<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
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
            'title' => 'required|max:200',
            'address' => 'required|max:50',
            'description' => 'required|max:1000',
            'price' => 'required|integer|min:0',
            'deposit' => 'required|integer|min:0',
            'owner_name' => 'required|max:50',
            'owner_phone_number' => 'required|max:11',
            'owner_email' => 'required|email|max:100',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'area' => 'required|integer|min:0',
            'status' => 'integer|min:0|max:2',
        ];
    }
}
