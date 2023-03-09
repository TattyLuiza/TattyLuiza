<?php

namespace App\Http\Requests;

use App\Models\Turmaprofessordisciplina;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTurmaprofessordisciplinaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('turmaprofessordisciplina_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:turmaprofessordisciplinas,id',
        ];
    }
}
