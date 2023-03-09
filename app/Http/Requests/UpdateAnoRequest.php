<?php

namespace App\Http\Requests;

use App\Models\Ano;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ano_edit');
    }

    public function rules()
    {
        return [
            'ano' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'logomarca' => [
                'string',
                'max:100',
                'nullable',
            ],
            'escola' => [
                'string',
                'max:100',
                'nullable',
            ],
            'cnpj' => [
                'string',
                'max:20',
                'nullable',
            ],
            'portaria_1' => [
                'string',
                'max:180',
                'nullable',
            ],
            'portaria_2' => [
                'string',
                'max:180',
                'nullable',
            ],
            'portaria_3' => [
                'string',
                'nullable',
            ],
            'portaria_4' => [
                'string',
                'nullable',
            ],
            'portaria_5' => [
                'string',
                'nullable',
            ],
            'portaria_6' => [
                'string',
                'nullable',
            ],
            'rua' => [
                'string',
                'max:180',
                'nullable',
            ],
            'bairro' => [
                'string',
                'max:180',
                'nullable',
            ],
            'cep' => [
                'string',
                'max:20',
                'nullable',
            ],
            'telefones' => [
                'string',
                'max:180',
                'nullable',
            ],
            'cidade' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'max:180',
                'nullable',
            ],
            'url' => [
                'string',
                'max:180',
                'nullable',
            ],
            'boletim' => [
                'string',
                'max:180',
                'nullable',
            ],
            'falta' => [
                'string',
                'min:1',
                'max:1',
                'nullable',
            ],
            'bim_1' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bim_2' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bim_3' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bim_4' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'valor_1' => [
                'required',
            ],
            'desc_1' => [
                'string',
                'nullable',
            ],
            'valor_2' => [
                'required',
            ],
            'desc_2' => [
                'string',
                'max:200',
                'nullable',
            ],
            'valor_3' => [
                'required',
            ],
            'desc_3' => [
                'string',
                'max:200',
                'nullable',
            ],
            'valor_4' => [
                'required',
            ],
            'desc_4' => [
                'string',
                'max:200',
                'nullable',
            ],
            'valor_5' => [
                'required',
            ],
            'desc_5' => [
                'string',
                'max:200',
                'nullable',
            ],
            'prof_recado' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'prof_tarefa' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'datai_1' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'dataf_1' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'datai_2' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'dataf_2' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'datai_3' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'dataf_3' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'datai_4' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'dataf_4' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'diapgto' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'mora_1' => [
                'string',
                'max:200',
                'nullable',
            ],
            'multa_1' => [
                'string',
                'max:200',
                'nullable',
            ],
            'instrucao_1' => [
                'string',
                'max:200',
                'nullable',
            ],
            'mora_2' => [
                'string',
                'max:200',
                'nullable',
            ],
            'multa_2' => [
                'string',
                'max:200',
                'nullable',
            ],
            'instrucao_2' => [
                'string',
                'max:200',
                'nullable',
            ],
            'mora_3' => [
                'string',
                'max:200',
                'nullable',
            ],
            'multa_3' => [
                'string',
                'max:200',
                'nullable',
            ],
            'instrucao_3' => [
                'string',
                'max:200',
                'nullable',
            ],
            'mora_4' => [
                'string',
                'max:200',
                'nullable',
            ],
            'multa_4' => [
                'string',
                'max:200',
                'nullable',
            ],
            'instrucao_4' => [
                'string',
                'max:200',
                'nullable',
            ],
            'dia_vencimento' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
