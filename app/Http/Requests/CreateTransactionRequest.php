<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id_payer' => ['required', 'exists:wallets,id'],
            'customer_id_receiver' => ['required', 'exists:wallets,id'],
            'amount' => ['required', 'integer'],
            'status' => ['required', 'string']
        ];
    }
}
