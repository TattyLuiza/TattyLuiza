<?php

namespace App\Http\Requests;

use App\Models\Boletin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBoletinRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('boletin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:boletins,id',
        ];
    }
}
