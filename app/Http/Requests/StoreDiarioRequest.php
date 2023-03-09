<?php

namespace App\Http\Requests;

use App\Models\Diario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDiarioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('diario_create');
    }

    public function rules()
    {
        return [
            'dia_letivo_id' => [
                'required',
                'integer',
            ],
            'horario_id' => [
                'required',
                'integer',
            ],
            'turma_id' => [
                'required',
                'integer',
            ],
            'disciplina_id' => [
                'required',
                'integer',
            ],
            'conteudo' => [
                'required',
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
