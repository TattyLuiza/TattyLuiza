@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.diario.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.diarios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.diario.fields.id') }}
                        </th>
                        <td>
                            {{ $diario->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diario.fields.dia_letivo') }}
                        </th>
                        <td>
                            {{ $diario->dia_letivo->data ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diario.fields.horario') }}
                        </th>
                        <td>
                            {{ $diario->horario->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diario.fields.turma') }}
                        </th>
                        <td>
                            {{ $diario->turma->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diario.fields.disciplina') }}
                        </th>
                        <td>
                            {{ $diario->disciplina->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diario.fields.professor') }}
                        </th>
                        <td>
                            {{ $diario->professor->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diario.fields.conteudo') }}
                        </th>
                        <td>
                            {!! $diario->conteudo !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diario.fields.status') }}
                        </th>
                        <td>
                            {{ $diario->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diario.fields.obs') }}
                        </th>
                        <td>
                            {!! $diario->obs !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.diarios.index') }}">
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
            <a class="nav-link" href="#diario_diarios_alunos" role="tab" data-toggle="tab">
                {{ trans('cruds.diariosAluno.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="diario_diarios_alunos">
            @includeIf('admin.diarios.relationships.diarioDiariosAlunos', ['diariosAlunos' => $diario->diarioDiariosAlunos])
        </div>
    </div>
</div>

@endsection