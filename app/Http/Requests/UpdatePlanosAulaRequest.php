<?php

namespace App\Http\Requests;

use App\Models\PlanosAula;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePlanosAulaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('planos_aula_edit');
    }

    public function rules()
    {
        return [
            'horario_id' => [
                'required',
                'integer',
            ],
            'disciplina_id' => [
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
            'dia_letivo_id' => [
                'required',
                'integer',
            ],
            'bimestre' => [
                'string',
                'nullable',
            ],
            'carga_horaria' => [
                'string',
                'nullable',
            ],
            'apostila' => [
                'string',
                'nullable',
            ],
            'capitulo' => [
                'string',
                'nullable',
            ],
        ];
    }
}
