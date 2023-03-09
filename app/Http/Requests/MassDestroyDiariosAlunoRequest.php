<?php

namespace App\Http\Requests;

use App\Models\DiariosAluno;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDiariosAlunoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('diarios_aluno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:diarios_alunos,id',
        ];
    }
}
