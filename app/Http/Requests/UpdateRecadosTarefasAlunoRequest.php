<?php

namespace App\Http\Requests;

use App\Models\RecadosTarefasAluno;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRecadosTarefasAlunoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('recados_tarefas_aluno_edit');
    }

    public function rules()
    {
        return [
            'id_professor_id' => [
                'required',
                'integer',
            ],
            'id_alunos.*' => [
                'integer',
            ],
            'id_alunos' => [
                'array',
            ],
            'titulo' => [
                'string',
                'required',
            ],
            'tipo' => [
                'string',
                'max:1',
                'required',
            ],
            'modo' => [
                'string',
                'required',
            ],
            'leu' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'agendamento' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'lida_at' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
