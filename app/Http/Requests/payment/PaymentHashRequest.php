<?php

namespace App\Http\Requests\payment;

use Illuminate\Foundation\Http\FormRequest;

class PaymentHashRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'items'=>'required',
            'amount'=>'required|integer',
            'currency'=>'required',
            'email'=>'required',
        ];
    }
}
