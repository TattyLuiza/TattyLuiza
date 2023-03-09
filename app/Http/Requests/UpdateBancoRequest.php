<?php

namespace App\Http\Requests;

use App\Models\Banco;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBancoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('banco_edit');
    }

    public function rules()
    {
        return [
            'padrao' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'listar' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cod' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nome' => [
                'string',
                'nullable',
            ],
            'beneficiario' => [
                'string',
                'nullable',
            ],
            'cnpj' => [
                'string',
                'max:20',
                'nullable',
            ],
            'banco' => [
                'string',
                'max:150',
                'nullable',
            ],
            'agencia' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'agencia_dv' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'conta' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'conta_dv' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cedente' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cedente_dv' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'carteira' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'arquivo' => [
                'string',
                'max:150',
                'nullable',
            ],
        ];
    }
}
