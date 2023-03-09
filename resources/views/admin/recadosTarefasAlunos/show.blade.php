@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.recadosTarefasAluno.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.recados-tarefas-alunos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.id') }}
                        </th>
                        <td>
                            {{ $recadosTarefasAluno->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.id_recado_tarefa_professor') }}
                        </th>
                        <td>
                            {{ $recadosTarefasAluno->id_recado_tarefa_professor->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.id_professor') }}
                        </th>
                        <td>
                            {{ $recadosTarefasAluno->id_professor->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.id_aluno') }}
                        </th>
                        <td>
                            @foreach($recadosTarefasAluno->id_alunos as $key => $id_aluno)
                                <span class="label label-info">{{ $id_aluno->nome }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.titulo') }}
                        </th>
                        <td>
                            {{ $recadosTarefasAluno->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.texto') }}
                        </th>
                        <td>
                            {!! $recadosTarefasAluno->texto !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.arquivo') }}
                        </th>
                        <td>
                            {{ $recadosTarefasAluno->arquivo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.tipo') }}
                        </th>
                        <td>
                            {{ $recadosTarefasAluno->tipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.modo') }}
                        </th>
                        <td>
                            {{ $recadosTarefasAluno->modo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.leu') }}
                        </th>
                        <td>
                            {{ $recadosTarefasAluno->leu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.agendamento') }}
                        </th>
                        <td>
                            {{ $recadosTarefasAluno->agendamento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.lida_at') }}
                        </th>
                        <td>
                            {{ $recadosTarefasAluno->lida_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.recados-tarefas-alunos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection