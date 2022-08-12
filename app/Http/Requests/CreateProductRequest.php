<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => ['required', 'max:30'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'product name is required',
            'name.max' => 'dont have enough character',
        ]; // TODO: Change the autogenerated stub
    }
}
