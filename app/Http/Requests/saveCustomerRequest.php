<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveCustomerRequest extends FormRequest
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
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:customers,email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'last_name' => 'Apellido',
            'email' => 'Email',
            'phone' => 'Telefono',
            'address' => 'Direccion',
            'city' => 'Ciudad',
        ];
    }
}
