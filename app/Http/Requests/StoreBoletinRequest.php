<?php

namespace App\Http\Requests;

use App\Models\Boletin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBoletinRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('boletin_create');
    }

    public function rules()
    {
        return [
            'aluno_id' => [
                'required',
                'integer',
            ],
            'matricula_id' => [
                'required',
                'integer',
            ],
            'professor_id' => [
                'required',
                'integer',
            ],
            'turma_id' => [
                'required',
                'integer',
            ],
            'disciplina_id' => [
                'required',
                'integer',
            ],
            't_1' => [
                'string',
                'nullable',
            ],
            'n_1' => [
                'string',
                'nullable',
            ],
            'f_1' => [
                'string',
                'nullable',
            ],
            't_2' => [
                'string',
                'nullable',
            ],
            'n_2' => [
                'string',
                'nullable',
            ],
            'f_2' => [
                'string',
                'nullable',
            ],
            't_3' => [
                'string',
                'nullable',
            ],
            'n_3' => [
                'string',
                'nullable',
            ],
            'f_3' => [
                'string',
                'nullable',
            ],
            't_4' => [
                'string',
                'nullable',
            ],
            'n_4' => [
                'string',
                'nullable',
            ],
            'f_4' => [
                'string',
                'nullable',
            ],
            'r_1' => [
                'string',
                'nullable',
            ],
            'r_2' => [
                'string',
                'nullable',
            ],
            'r_3' => [
                'string',
                'nullable',
            ],
            'r_4' => [
                'string',
                'nullable',
            ],
            'tr' => [
                'string',
                'nullable',
            ],
            'tr_nota' => [
                'string',
                'nullable',
            ],
            't_falta' => [
                'string',
                'nullable',
            ],
            'recuperacao' => [
                'string',
                'nullable',
            ],
            'resultado' => [
                'string',
                'nullable',
            ],
            'aluno_nome' => [
                'string',
                'nullable',
            ],
            'turma_nome' => [
                'string',
                'nullable',
            ],
            'materia_nome' => [
                'string',
                'nullable',
            ],
            'abreviado_nome' => [
                'string',
                'nullable',
            ],
            'professor_nome' => [
                'string',
                'nullable',
            ],
        ];
    }
}
