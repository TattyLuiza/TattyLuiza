<?php

namespace App\Http\Requests;

use App\Models\HorarioSemanal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHorarioSemanalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('horario_semanal_create');
    }

    public function rules()
    {
        return [
            'ano_id' => [
                'required',
                'integer',
            ],
            'turma_id' => [
                'required',
                'integer',
            ],
            'professor_id' => [
                'required',
                'integer',
            ],
            'horario_id' => [
                'required',
                'integer',
            ],
            'disciplina_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
