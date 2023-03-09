@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.seriedisciplina.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seriedisciplinas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.seriedisciplina.fields.id') }}
                        </th>
                        <td>
                            {{ $seriedisciplina->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seriedisciplina.fields.serie') }}
                        </th>
                        <td>
                            {{ $seriedisciplina->serie->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seriedisciplina.fields.disciplina') }}
                        </th>
                        <td>
                            {{ $seriedisciplina->disciplina->nome ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seriedisciplinas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection