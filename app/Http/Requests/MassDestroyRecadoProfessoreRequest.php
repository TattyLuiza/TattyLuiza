<?php

namespace App\Http\Requests;

use App\Models\RecadoProfessore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRecadoProfessoreRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('recado_professore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:recado_professores,id',
        ];
    }
}
