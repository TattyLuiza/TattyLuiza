<?php

namespace App\Http\Requests;

use App\Models\Professor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProfessorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('professor_create');
    }

    public function rules()
    {
        return [
            'status' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cargo' => [
                'string',
                'max:100',
                'nullable',
            ],
            'banco' => [
                'string',
                'nullable',
            ],
            'pis' => [
                'string',
                'max:15',
                'nullable',
            ],
            'ctps' => [
                'string',
                'max:15',
                'nullable',
            ],
            'admissao' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'cpf' => [
                'string',
                'nullable',
            ],
            'rg' => [
                'string',
                'max:15',
                'nullable',
            ],
            'nome' => [
                'string',
                'max:180',
                'required',
            ],
            'nascimento' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'naturalidade' => [
                'string',
                'max:100',
                'nullable',
            ],
            'rua' => [
                'string',
                'max:200',
                'nullable',
            ],
            'numero' => [
                'string',
                'max:50',
                'nullable',
            ],
            'complemento' => [
                'string',
                'max:50',
                'nullable',
            ],
            'bairro' => [
                'string',
                'max:80',
                'nullable',
            ],
            'cep' => [
                'string',
                'max:10',
                'nullable',
            ],
            'cidade' => [
                'string',
                'max:100',
                'nullable',
            ],
            'estado' => [
                'string',
                'min:2',
                'max:2',
                'nullable',
            ],
            'telefone' => [
                'string',
                'max:200',
                'nullable',
            ],
            'celular' => [
                'string',
                'max:100',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
        ];
    }
}
