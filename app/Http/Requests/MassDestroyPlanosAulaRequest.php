<?php

namespace App\Http\Requests;

use App\Models\PlanosAula;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPlanosAulaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('planos_aula_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:planos_aulas,id',
        ];
    }
}
