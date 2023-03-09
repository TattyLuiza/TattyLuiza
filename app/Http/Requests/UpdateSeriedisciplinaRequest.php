<?php

namespace App\Http\Requests;

use App\Models\Seriedisciplina;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSeriedisciplinaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('seriedisciplina_edit');
    }

    public function rules()
    {
        return [
            'serie_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
