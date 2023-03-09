@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.matricula.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.matriculas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.id') }}
                        </th>
                        <td>
                            {{ $matricula->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.ano') }}
                        </th>
                        <td>
                            {{ $matricula->ano->ano ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.status') }}
                        </th>
                        <td>
                            {{ $matricula->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.aluno') }}
                        </th>
                        <td>
                            {{ $matricula->aluno->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.mae') }}
                        </th>
                        <td>
                            {{ $matricula->mae->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.pai') }}
                        </th>
                        <td>
                            {{ $matricula->pai->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.turno') }}
                        </th>
                        <td>
                            {{ $matricula->turno }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.turma') }}
                        </th>
                        <td>
                            {{ $matricula->turma->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.valor') }}
                        </th>
                        <td>
                            {{ $matricula->valor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.desconto') }}
                        </th>
                        <td>
                            {{ $matricula->desconto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.total') }}
                        </th>
                        <td>
                            {{ $matricula->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.conceito_1') }}
                        </th>
                        <td>
                            {{ $matricula->conceito_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.conceito_2') }}
                        </th>
                        <td>
                            {{ $matricula->conceito_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.conceito_3') }}
                        </th>
                        <td>
                            {{ $matricula->conceito_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.conceito_4') }}
                        </th>
                        <td>
                            {{ $matricula->conceito_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.conceitofinal') }}
                        </th>
                        <td>
                            {{ $matricula->conceitofinal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.obs') }}
                        </th>
                        <td>
                            {{ $matricula->obs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.falta_1') }}
                        </th>
                        <td>
                            {{ $matricula->falta_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.falta_3') }}
                        </th>
                        <td>
                            {{ $matricula->falta_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.falta_4') }}
                        </th>
                        <td>
                            {{ $matricula->falta_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.faltaf') }}
                        </th>
                        <td>
                            {{ $matricula->faltaf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.data_transferencia') }}
                        </th>
                        <td>
                            {{ $matricula->data_transferencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matricula.fields.obs_transferencia') }}
                        </th>
                        <td>
                            {{ $matricula->obs_transferencia }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.matriculas.index') }}">
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
            <a class="nav-link" href="#matricula_diarios_alunos" role="tab" data-toggle="tab">
                {{ trans('cruds.diariosAluno.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="matricula_diarios_alunos">
            @includeIf('admin.matriculas.relationships.matriculaDiariosAlunos', ['diariosAlunos' => $matricula->matriculaDiariosAlunos])
        </div>
    </div>
</div>

@endsection