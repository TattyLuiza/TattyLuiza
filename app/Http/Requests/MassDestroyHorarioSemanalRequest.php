<?php

namespace App\Http\Requests;

use App\Models\HorarioSemanal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHorarioSemanalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('horario_semanal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:horario_semanals,id',
        ];
    }
}
