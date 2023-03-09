@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.horario.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.horarios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.id') }}
                        </th>
                        <td>
                            {{ $horario->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.ano') }}
                        </th>
                        <td>
                            {{ $horario->ano->ano ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.nome') }}
                        </th>
                        <td>
                            {{ $horario->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.ini') }}
                        </th>
                        <td>
                            {{ $horario->ini }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.fim') }}
                        </th>
                        <td>
                            {{ $horario->fim }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.horarios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#horario_horario_semanals" role="tab" data-toggle="tab">
                {{ trans('cruds.horarioSemanal.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#horario_diarios" role="tab" data-toggle="tab">
                {{ trans('cruds.diario.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="horario_horario_semanals">
            @includeIf('admin.horarios.relationships.horarioHorarioSemanals', ['horarioSemanals' => $horario->horarioHorarioSemanals])
        </div>
        <div class="tab-pane" role="tabpanel" id="horario_diarios">
            @includeIf('admin.horarios.relationships.horarioDiarios', ['diarios' => $horario->horarioDiarios])
        </div>
    </div>
</div>

@endsection