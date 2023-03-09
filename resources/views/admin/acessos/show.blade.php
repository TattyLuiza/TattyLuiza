@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.acesso.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.acessos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.acesso.fields.id') }}
                        </th>
                        <td>
                            {{ $acesso->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acesso.fields.usuario') }}
                        </th>
                        <td>
                            {{ $acesso->usuario }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acesso.fields.url') }}
                        </th>
                        <td>
                            {{ $acesso->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acesso.fields.ip') }}
                        </th>
                        <td>
                            {{ $acesso->ip }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.acessos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection