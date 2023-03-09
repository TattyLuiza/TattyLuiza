<?php

namespace App\Http\Requests;

use App\Models\Series;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSeriesRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('series_create');
    }

    public function rules()
    {
        return [
            'tipo' => [
                'string',
                'nullable',
            ],
            'nome' => [
                'string',
                'min:3',
                'max:50',
                'required',
            ],
            'turno' => [
                'string',
                'nullable',
            ],
            'sala' => [
                'string',
                'nullable',
            ],
        ];
    }
}
