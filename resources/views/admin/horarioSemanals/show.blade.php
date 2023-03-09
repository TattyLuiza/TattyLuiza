@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.horarioSemanal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.horario-semanals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.id') }}
                        </th>
                        <td>
                            {{ $horarioSemanal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.ano') }}
                        </th>
                        <td>
                            {{ $horarioSemanal->ano->ano ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.turma') }}
                        </th>
                        <td>
                            {{ $horarioSemanal->turma->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.professor') }}
                        </th>
                        <td>
                            {{ $horarioSemanal->professor->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.horario') }}
                        </th>
                        <td>
                            {{ $horarioSemanal->horario->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.disciplina') }}
                        </th>
                        <td>
                            {{ $horarioSemanal->disciplina->nome ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.horario-semanals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection