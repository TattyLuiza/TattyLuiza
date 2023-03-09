<?php

namespace App\Http\Requests;

use App\Models\Disciplina;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDisciplinaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('disciplina_create');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'required',
            ],
            'abreviado' => [
                'string',
                'nullable',
            ],
            'tipo' => [
                'string',
                'max:1',
                'nullable',
            ],
            'livros' => [
                'string',
                'nullable',
            ],
            'ordem' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tipo_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
