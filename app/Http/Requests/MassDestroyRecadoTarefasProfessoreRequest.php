<?php

namespace App\Http\Requests;

use App\Models\RecadoTarefasProfessore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRecadoTarefasProfessoreRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('recado_tarefas_professore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:recado_tarefas_professores,id',
        ];
    }
}
