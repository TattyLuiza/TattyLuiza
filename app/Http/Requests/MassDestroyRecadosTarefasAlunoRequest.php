<?php

namespace App\Http\Requests;

use App\Models\RecadosTarefasAluno;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRecadosTarefasAlunoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('recados_tarefas_aluno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:recados_tarefas_alunos,id',
        ];
    }
}
