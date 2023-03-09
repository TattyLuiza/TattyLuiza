@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.recadoTarefasProfessore.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.recado-tarefas-professores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoTarefasProfessore.fields.id') }}
                        </th>
                        <td>
                            {{ $recadoTarefasProfessore->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoTarefasProfessore.fields.id_professor') }}
                        </th>
                        <td>
                            @foreach($recadoTarefasProfessore->id_professors as $key => $id_professor)
                                <span class="label label-info">{{ $id_professor->nome }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoTarefasProfessore.fields.tipo') }}
                        </th>
                        <td>
                            {{ $recadoTarefasProfessore->tipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoTarefasProfessore.fields.turmas') }}
                        </th>
                        <td>
                            {{ $recadoTarefasProfessore->turmas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoTarefasProfessore.fields.alunos') }}
                        </th>
                        <td>
                            {{ $recadoTarefasProfessore->alunos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoTarefasProfessore.fields.titulo') }}
                        </th>
                        <td>
                            {{ $recadoTarefasProfessore->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoTarefasProfessore.fields.texto') }}
                        </th>
                        <td>
                            {!! $recadoTarefasProfessore->texto !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoTarefasProfessore.fields.arquivos') }}
                        </th>
                        <td>
                            {{ $recadoTarefasProfessore->arquivos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoTarefasProfessore.fields.agendamento_at') }}
                        </th>
                        <td>
                            {{ $recadoTarefasProfessore->agendamento_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.recado-tarefas-professores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection