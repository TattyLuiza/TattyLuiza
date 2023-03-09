@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.conceito.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.conceitos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.conceito.fields.id') }}
                        </th>
                        <td>
                            {{ $conceito->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.conceito.fields.nome') }}
                        </th>
                        <td>
                            {{ $conceito->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.conceito.fields.tipo') }}
                        </th>
                        <td>
                            {{ $conceito->tipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.conceito.fields.obs') }}
                        </th>
                        <td>
                            {!! $conceito->obs !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.conceitos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection