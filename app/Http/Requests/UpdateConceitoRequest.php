<?php

namespace App\Http\Requests;

use App\Models\Conceito;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateConceitoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('conceito_edit');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'required',
            ],
            'tipo' => [
                'string',
                'max:1',
                'nullable',
            ],
        ];
    }
}
