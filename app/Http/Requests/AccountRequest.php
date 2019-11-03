<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'name' => 'required',
            'opening_balance' => 'required',
            'account_number' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Account name is required',
            'opening_balance.required' => 'Opening balance is required',
            'account_number.required' => 'Account number is required',
        ];
    }
}
