@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.turmaprofessordisciplina.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.turmaprofessordisciplinas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.turmaprofessordisciplina.fields.id') }}
                        </th>
                        <td>
                            {{ $turmaprofessordisciplina->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turmaprofessordisciplina.fields.turma') }}
                        </th>
                        <td>
                            {{ $turmaprofessordisciplina->turma->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turmaprofessordisciplina.fields.professor') }}
                        </th>
                        <td>
                            {{ $turmaprofessordisciplina->professor->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turmaprofessordisciplina.fields.disciplina') }}
                        </th>
                        <td>
                            {{ $turmaprofessordisciplina->disciplina->nome ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.turmaprofessordisciplinas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection