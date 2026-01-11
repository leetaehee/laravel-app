<?php

namespace App\Http\Requests\Users;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class LoginUserRequest extends FormRequest
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
            'password' => [
                'required',
                'min:8',
                'max:15',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/',
            ],
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        Log::info('User login validation failed', [
            'action' => 'validate',
            'model' => 'User',
            'email' => $this->input('email'),
            'ip' => $this->ip(),
            'errors' => $validator->errors()->toArray(),
        ]);

        throw new HttpResponseException(
            redirect('/users/login')->withErrors($validator)->withInput()
        );
    }
}
