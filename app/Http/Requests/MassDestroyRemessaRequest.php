<?php

namespace App\Http\Requests;

use App\Models\Remessa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRemessaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('remessa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:remessas,id',
        ];
    }
}
