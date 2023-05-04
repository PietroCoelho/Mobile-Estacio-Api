<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilitieRequest extends FormRequest
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
            'description' => 'required',
            'amount' => 'required|float',
            'time_service' => 'required|time',
            'status' => 'required|int',
        ];
    }

    public function rulesPut()
    {
        return [];
    }

    public function messages()
    {
        return [
            'description.required' => __('É necessário informar a descrição do serviço - param[description]'),
            'amount.required' => __('É necessário informar o valor do serviço - param[amount]'),
            'time_service.required' => __('É necessário informar o tempo que levará o serviço - param[time_service]'),
            'status.required' => __('É necessário informar o status do serviço - param[status]'),
            'status.int' => __('O tipo de informação do status deve ser um inteiro - param[status]')
        ];
    }
}
