<?php

namespace App\Http\Requests;

use App\Models\EmailsEnviado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEmailsEnviadoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('emails_enviado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:emails_enviados,id',
        ];
    }
}
