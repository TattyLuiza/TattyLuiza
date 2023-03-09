@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.planosAula.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.planos-aulas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.id') }}
                        </th>
                        <td>
                            {{ $planosAula->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.horario') }}
                        </th>
                        <td>
                            {{ $planosAula->horario->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.disciplina') }}
                        </th>
                        <td>
                            {{ $planosAula->disciplina->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.turma') }}
                        </th>
                        <td>
                            {{ $planosAula->turma->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.professor') }}
                        </th>
                        <td>
                            {{ $planosAula->professor->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.dia_letivo') }}
                        </th>
                        <td>
                            {{ $planosAula->dia_letivo->data ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.bimestre') }}
                        </th>
                        <td>
                            {{ $planosAula->bimestre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.carga_horaria') }}
                        </th>
                        <td>
                            {{ $planosAula->carga_horaria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.apostila') }}
                        </th>
                        <td>
                            {{ $planosAula->apostila }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.capitulo') }}
                        </th>
                        <td>
                            {{ $planosAula->capitulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.conteudo') }}
                        </th>
                        <td>
                            {!! $planosAula->conteudo !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.habilidades') }}
                        </th>
                        <td>
                            {!! $planosAula->habilidades !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.metodologia') }}
                        </th>
                        <td>
                            {!! $planosAula->metodologia !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.avaliacao') }}
                        </th>
                        <td>
                            {!! $planosAula->avaliacao !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.link') }}
                        </th>
                        <td>
                            {!! $planosAula->link !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.recurso') }}
                        </th>
                        <td>
                            {{ $planosAula->recurso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.atividade') }}
                        </th>
                        <td>
                            {{ $planosAula->atividade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planosAula.fields.leitura') }}
                        </th>
                        <td>
                            {{ $planosAula->leitura }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.planos-aulas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection