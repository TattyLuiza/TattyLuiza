<?php

namespace App\Http\Requests;

use App\Models\Turmaprofessordisciplina;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTurmaprofessordisciplinaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('turmaprofessordisciplina_create');
    }

    public function rules()
    {
        return [
            'turma_id' => [
                'required',
                'integer',
            ],
            'professor_id' => [
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
