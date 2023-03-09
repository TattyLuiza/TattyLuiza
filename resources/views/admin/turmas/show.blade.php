@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.turma.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.turmas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.id') }}
                        </th>
                        <td>
                            {{ $turma->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.serie') }}
                        </th>
                        <td>
                            {{ $turma->serie->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.banco') }}
                        </th>
                        <td>
                            {{ $turma->banco->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.ano') }}
                        </th>
                        <td>
                            {{ $turma->ano->ano ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.tipo') }}
                        </th>
                        <td>
                            {{ $turma->tipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.nome') }}
                        </th>
                        <td>
                            {{ $turma->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.sala') }}
                        </th>
                        <td>
                            {{ $turma->sala }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.turno') }}
                        </th>
                        <td>
                            {{ $turma->turno }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.valor') }}
                        </th>
                        <td>
                            {{ $turma->valor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.obs') }}
                        </th>
                        <td>
                            {!! $turma->obs !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.letivos') }}
                        </th>
                        <td>
                            {{ $turma->letivos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.carga_horaria') }}
                        </th>
                        <td>
                            {{ $turma->carga_horaria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.turma.fields.falta') }}
                        </th>
                        <td>
                            {{ $turma->falta }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.turmas.index') }}">
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
            <a class="nav-link" href="#turma_matriculas" role="tab" data-toggle="tab">
                {{ trans('cruds.matricula.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#turma_planos_aulas" role="tab" data-toggle="tab">
                {{ trans('cruds.planosAula.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#turma_horario_semanals" role="tab" data-toggle="tab">
                {{ trans('cruds.horarioSemanal.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="turma_matriculas">
            @includeIf('admin.turmas.relationships.turmaMatriculas', ['matriculas' => $turma->turmaMatriculas])
        </div>
        <div class="tab-pane" role="tabpanel" id="turma_planos_aulas">
            @includeIf('admin.turmas.relationships.turmaPlanosAulas', ['planosAulas' => $turma->turmaPlanosAulas])
        </div>
        <div class="tab-pane" role="tabpanel" id="turma_horario_semanals">
            @includeIf('admin.turmas.relationships.turmaHorarioSemanals', ['horarioSemanals' => $turma->turmaHorarioSemanals])
        </div>
    </div>
</div>

@endsection