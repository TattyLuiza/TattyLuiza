<?php

namespace App\Http\Requests;

use App\Models\EmailsEnviado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmailsEnviadoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('emails_enviado_create');
    }

    public function rules()
    {
        return [
            'id_emails.*' => [
                'integer',
            ],
            'id_emails' => [
                'required',
                'array',
            ],
            'nome' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'clicou' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
