<?php

namespace App\Http\Requests;

use App\Models\RecadoTarefasProfessore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRecadoTarefasProfessoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('recado_tarefas_professore_create');
    }

    public function rules()
    {
        return [
            'id_professors.*' => [
                'integer',
            ],
            'id_professors' => [
                'array',
            ],
            'tipo' => [
                'string',
                'max:1',
                'required',
            ],
            'titulo' => [
                'string',
                'required',
            ],
            'agendamento_at' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
