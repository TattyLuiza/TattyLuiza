@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.email.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.emails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.email.fields.id') }}
                        </th>
                        <td>
                            {{ $email->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.email.fields.nome') }}
                        </th>
                        <td>
                            {{ $email->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.email.fields.texto') }}
                        </th>
                        <td>
                            {{ $email->texto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.email.fields.inicio') }}
                        </th>
                        <td>
                            {{ $email->inicio }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.emails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection