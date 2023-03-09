<?php

namespace App\Http\Requests;

use App\Models\Remessa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRemessaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('remessa_edit');
    }

    public function rules()
    {
        return [];
    }
}
