<?php

namespace App\Http\Requests;

use App\Models\DiariosAluno;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDiariosAlunoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('diarios_aluno_edit');
    }

    public function rules()
    {
        return [
            'diario_id' => [
                'required',
                'integer',
            ],
            'matricula_id' => [
                'required',
                'integer',
            ],
            'presenca' => [
                'string',
                'min:1',
                'max:1',
                'nullable',
            ],
            'status' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
