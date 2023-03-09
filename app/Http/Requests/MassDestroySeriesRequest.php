<?php

namespace App\Http\Requests;

use App\Models\Series;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySeriesRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('series_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:seriess,id',
        ];
    }
}
