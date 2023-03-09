<?php

namespace App\Http\Requests;

use App\Models\Boleto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBoletoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('boleto_create');
    }

    public function rules()
    {
        return [
            'banco_id' => [
                'required',
                'integer',
            ],
            'movimento' => [
                'string',
                'nullable',
            ],
            'descricao' => [
                'string',
                'nullable',
            ],
            'parcela' => [
                'string',
                'nullable',
            ],
            'valor' => [
                'required',
            ],
            'recebido' => [
                'required',
            ],
            'datadesconto' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'valordesconto' => [
                'required',
            ],
            'instrucoes' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
            'tipo' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'mora' => [
                'string',
                'nullable',
            ],
            'multa' => [
                'string',
                'nullable',
            ],
            'vencimento' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'data' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
