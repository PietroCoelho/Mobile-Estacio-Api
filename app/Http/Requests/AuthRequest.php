<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rulesPostLogin()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function rulesPostRegister()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('Email é obrigatório'),
            'password.required' => __('Senha é obrigatório'),
            'name.required' => __('Nome é obrigatório')
        ];
    }
}
