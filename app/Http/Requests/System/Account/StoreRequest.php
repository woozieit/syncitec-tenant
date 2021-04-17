<?php

namespace App\Http\Requests\System\Account;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'bank' => 'required',
            'number_account' => 'required',
            'name_account' => 'required',
            'cci' => 'nullable'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'bank.required' => 'El campo "BANCO" es requerido',
            'number_account.required' => 'El campo "NÚMERO DE CUENTA" es requerido',
            'name_account.required' => 'El campo "TITULAR" es requerido',
        ];
    }
}
