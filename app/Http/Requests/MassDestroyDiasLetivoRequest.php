<?php

namespace App\Http\Requests;

use App\Models\DiasLetivo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDiasLetivoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dias_letivo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dias_letivos,id',
        ];
    }
}
