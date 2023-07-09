<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveOrderRequest extends FormRequest
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
            'customer_id' => 'required',
            'book_id' => 'required',
            'date' => 'required',
            'status' => 'required',
        ];
    }

    /**
     * Get the messages that apply to the request.
     *
     * @return array<string, mixed>
     */

    public function messages(){
        return [
            'customer_id.required' => 'El campo customer_id es requerido',
            'book_id.required' => 'El campo book_id es requerido',
            'date.required' => 'El campo date es requerido',
            'status.required' => 'El campo status es requerido',
        ];
    }

    public function attributes(){
        return [
            'customer_id' => 'customer_id',
            'book_id' => 'book_id',
            'date' => 'date',
            'status' => 'status',
        ];
    }
}
