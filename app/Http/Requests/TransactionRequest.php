<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'user_id' => 'required',
            'account_id' => 'required',
            'amount' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'user_id.required' => 'User id is required',
            'account_id.required' => 'Account is required',
            'name.required' => 'Name is required',
            'amount.required' => 'Amount is required',


        ];
    }
}
