<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'type_person_id' => 'required',
            'name' => 'required',
            'date_birth' => 'required|date',
            'contacts' => 'array',
        ];
    }

    public function rulesPut()
    {
        return [];
    }

    public function messages()
    {
        return [
            'type_person_id.required' => __('É necessário informar o tipo de pessoa ao serviço - param[type_person_id]'),
            'name.required' => __('É necessário informar o nome da pessoa ao serviço - param[name]'),
            'date_birth.required' => __('É necessário informar a data de nascimento da pessoa ao serviço - param[date_birth]'),
            'contacts.array' => __('É necessário informar uma informação de contato ao serviço - param[contacts[0][type_contact_id],param[contacts[0][description]'),
        ];
    }
}
