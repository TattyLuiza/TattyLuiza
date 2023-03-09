<?php

namespace App\Http\Requests;

use App\Models\Turma;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTurmaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('turma_create');
    }

    public function rules()
    {
        return [
            'serie_id' => [
                'required',
                'integer',
            ],
            'tipo' => [
                'string',
                'nullable',
            ],
            'nome' => [
                'string',
                'nullable',
            ],
            'sala' => [
                'string',
                'nullable',
            ],
            'turno' => [
                'string',
                'nullable',
            ],
            'letivos' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'carga_horaria' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'falta' => [
                'string',
                'nullable',
            ],
        ];
    }
}
