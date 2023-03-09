<?php

namespace App\Http\Requests;

use App\Models\Disciplina;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDisciplinaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('disciplina_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:disciplinas,id',
        ];
    }
}
