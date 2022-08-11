<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class CreateValidationRequest extends FormRequest
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
            'name'          => [new Uppercase], ['required|unique:cars'],
            'founded'       => 'required|integer|gt:1800|max:2022',
            'description'   => 'required|string',
            'image'         => 'required|mimes:jpg,jpeg,png|max:5048'
        ];
    }
}
