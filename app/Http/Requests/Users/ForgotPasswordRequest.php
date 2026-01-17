<?php

namespace App\Http\Requests\Users;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:rfc',
                'max:80',
                'regex:/^[A-Z0-9._%+\-]+@[A-Z0-9.\-]+\.[A-Z]{2,}$/i',
            ],
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        Log::info('Forgot password validation failed', [
            'action' => 'validate',
            'model' => 'User',
            'email' => $this->input('email'),
            'ip' => $this->ip(),
            'errors' => $validator->errors()->toArray(),
        ]);

        throw new HttpResponseException(
            to_route('password.find.account')->withErrors($validator)->withInput()
        );
    }
}
