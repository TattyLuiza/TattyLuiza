<?php

namespace App\Http\Requests;

use App\Models\Email;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_create');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'nullable',
            ],
            'inicio' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
