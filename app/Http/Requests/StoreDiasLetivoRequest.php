<?php

namespace App\Http\Requests;

use App\Models\DiasLetivo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDiasLetivoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dias_letivo_create');
    }

    public function rules()
    {
        return [
            'data' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'ano_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
