@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.disciplina.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.disciplinas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.disciplina.fields.id') }}
                        </th>
                        <td>
                            {{ $disciplina->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disciplina.fields.nome') }}
                        </th>
                        <td>
                            {{ $disciplina->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disciplina.fields.abreviado') }}
                        </th>
                        <td>
                            {{ $disciplina->abreviado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disciplina.fields.tipo') }}
                        </th>
                        <td>
                            {{ $disciplina->tipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disciplina.fields.ementa') }}
                        </th>
                        <td>
                            {!! $disciplina->ementa !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disciplina.fields.livros') }}
                        </th>
                        <td>
                            {{ $disciplina->livros }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disciplina.fields.ordem') }}
                        </th>
                        <td>
                            {{ $disciplina->ordem }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disciplina.fields.tipo_2') }}
                        </th>
                        <td>
                            {{ $disciplina->tipo_2 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.disciplinas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection