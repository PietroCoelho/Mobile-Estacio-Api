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
        return [
            'employee_id' => 'required',
            'person_id' => 'required',
            'utilitie_id' => 'required',
            'opening_hours' => 'required',
            'form_payment' => 'required',
            'amount' => 'required',
            'amount_paid' => 'required',
        ];
    }

    public function rulesPut()
    {
        return [];
    }

    public function messages()
    {
        return [
            'employee_id.required' => __('É necessário informar a funcionário que irá realizar o serviço - param[employee_id]'),
            'person_id.required' => __('É necessário informar o código da pessoa - param[person_id]'),
            'utilitie_id.required' => __('É necessário informar qual o serviço será realizado - param[utilitie_id]'),
            'opening_hours.required' => __('É necessário informar o horário do serviço - param[opening_hours]'),
            'form_payment.required' => __('É necessário informar a forma de pagamento - param[form_payment]'),
            'amount.required' => __('É necessário informar o valor do serviço - param[amount]'),
            'amount_paid.required' => __('É necessário informar a descrição do serviço - param[amount_paid]'),
        ];
    }
}
