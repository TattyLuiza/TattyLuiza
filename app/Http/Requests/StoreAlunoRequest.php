<?php

namespace App\Http\Requests;

use App\Models\Aluno;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAlunoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('aluno_create');
    }

    public function rules()
    {
        return [
            'status' => [
                'required',
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
            'cpf' => [
                'string',
                'max:20',
                'nullable',
            ],
            'rg' => [
                'string',
                'max:20',
                'nullable',
            ],
            'nacionalidade' => [
                'string',
                'max:100',
                'nullable',
            ],
            'naturalidade' => [
                'string',
                'max:100',
                'nullable',
            ],
            'cep' => [
                'string',
                'max:10',
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
            'cidade' => [
                'string',
                'max:100',
                'nullable',
            ],
            'estado' => [
                'string',
                'min:1',
                'max:2',
                'nullable',
            ],
            'telefone' => [
                'string',
                'max:100',
                'nullable',
            ],
            'acesso' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'email' => [
                'string',
                'max:100',
                'nullable',
            ],
            'categoria' => [
                'string',
                'max:100',
                'nullable',
            ],
            'frequentar' => [
                'string',
                'max:100',
                'nullable',
            ],
            'busca' => [
                'string',
                'max:180',
                'nullable',
            ],
            'busca_1' => [
                'string',
                'max:180',
                'nullable',
            ],
            'busca_2' => [
                'string',
                'max:180',
                'nullable',
            ],
            'busca_3' => [
                'string',
                'max:180',
                'nullable',
            ],
            'busca_4' => [
                'string',
                'max:180',
                'nullable',
            ],
            'parentesco_1' => [
                'string',
                'max:180',
                'nullable',
            ],
            'parentesco_2' => [
                'string',
                'max:180',
                'nullable',
            ],
            'parentesco_3' => [
                'string',
                'max:180',
                'nullable',
            ],
            'parentesco_4' => [
                'string',
                'max:180',
                'nullable',
            ],
            'desc_1' => [
                'string',
                'max:180',
                'nullable',
            ],
            'desc_2' => [
                'string',
                'max:180',
                'nullable',
            ],
            'desc_3' => [
                'string',
                'max:180',
                'nullable',
            ],
            'desc_4' => [
                'string',
                'max:180',
                'nullable',
            ],
            'desc_5' => [
                'string',
                'max:180',
                'nullable',
            ],
            'diavencimento' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
