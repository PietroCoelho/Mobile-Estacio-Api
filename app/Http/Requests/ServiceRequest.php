<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        return [];
    }

    public function rulesPut()
    {
        return [];
    }

    public function messages()
    {
        return [];
    }
}
