<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'editorial' => 'required',
            'genre' => 'required',
            'year' => 'required | numeric',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'author' => 'autor',
            'editorial' => 'editorial',
            'genre' => 'género',
            'year' => 'año',
        ];
    }
}
