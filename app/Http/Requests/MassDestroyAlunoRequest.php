<?php

namespace App\Http\Requests;

use App\Models\Aluno;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAlunoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('aluno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:alunos,id',
        ];
    }
}
