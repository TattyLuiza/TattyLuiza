<?php

namespace App\Http\Requests;

use App\Models\Matricula;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMatriculaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('matricula_edit');
    }

    public function rules()
    {
        return [
            'ano_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'aluno_id' => [
                'required',
                'integer',
            ],
            'aluno_nome' => [
                'string',
                'max:180',
                'required',
            ],
            'mae_id' => [
                'required',
                'integer',
            ],
            'mae_nome' => [
                'string',
                'max:180',
                'nullable',
            ],
            'pai_id' => [
                'required',
                'integer',
            ],
            'pai_nome' => [
                'string',
                'max:180',
                'nullable',
            ],
            'turno' => [
                'string',
                'nullable',
            ],
            'turma_nome' => [
                'string',
                'nullable',
            ],
            'valor' => [
                'required',
            ],
            'total' => [
                'required',
            ],
            'falta_1' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'falta_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'falta_3' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'falta_4' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'faltaf' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'data_transferencia' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
