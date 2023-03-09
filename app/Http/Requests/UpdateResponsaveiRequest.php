<?php

namespace App\Http\Requests;

use App\Models\Responsavei;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateResponsaveiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('responsavei_edit');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'max:180',
                'required',
            ],
            'rg' => [
                'string',
                'max:20',
                'required',
            ],
            'cpf' => [
                'string',
                'max:20',
                'required',
            ],
            'nascimento' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'rua' => [
                'string',
                'max:200',
                'nullable',
            ],
            'complemento' => [
                'string',
                'max:50',
                'nullable',
            ],
            'numero' => [
                'string',
                'max:50',
                'nullable',
            ],
            'bairro' => [
                'string',
                'max:80',
                'nullable',
            ],
            'cidade' => [
                'string',
                'max:100',
                'nullable',
            ],
            'estado' => [
                'string',
                'max:2',
                'nullable',
            ],
            'cep' => [
                'string',
                'max:10',
                'nullable',
            ],
            'nacionalidade' => [
                'string',
                'max:100',
                'nullable',
            ],
            'telefone' => [
                'string',
                'max:100',
                'nullable',
            ],
            'celular' => [
                'string',
                'max:100',
                'nullable',
            ],
            'email' => [
                'string',
                'max:100',
                'nullable',
            ],
            'instrucao' => [
                'string',
                'max:100',
                'nullable',
            ],
            'profissao' => [
                'string',
                'max:100',
                'nullable',
            ],
            'trabalho' => [
                'string',
                'max:100',
                'nullable',
            ],
            'fonetrabalho' => [
                'string',
                'max:100',
                'nullable',
            ],
        ];
    }
}
