<?php

namespace App\Http\Requests;

use App\Models\Acesso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAcessoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('acesso_edit');
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
