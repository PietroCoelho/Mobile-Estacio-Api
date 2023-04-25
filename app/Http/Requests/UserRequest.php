<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rulesGet()
    {
        return [];
    }

    public function rulesPost()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function rulesPut()
    {
        return [];
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
