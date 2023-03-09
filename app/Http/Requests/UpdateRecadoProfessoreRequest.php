<?php

namespace App\Http\Requests;

use App\Models\RecadoProfessore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRecadoProfessoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('recado_professore_edit');
    }

    public function rules()
    {
        return [
            'id_remetentes.*' => [
                'integer',
            ],
            'id_remetentes' => [
                'array',
            ],
            'titulo' => [
                'string',
                'nullable',
            ],
            'leu' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'lida_at' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
