<?php

namespace App\Http\Requests;

use App\Models\Acesso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAcessoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('acesso_create');
    }

    public function rules()
    {
        return [
            'usuario' => [
                'string',
                'nullable',
            ],
            'url' => [
                'string',
                'nullable',
            ],
            'ip' => [
                'string',
                'nullable',
            ],
        ];
    }
}
