@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.boletin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.boletins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.id') }}
                        </th>
                        <td>
                            {{ $boletin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.aluno') }}
                        </th>
                        <td>
                            {{ $boletin->aluno->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.matricula') }}
                        </th>
                        <td>
                            {{ $boletin->matricula->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.professor') }}
                        </th>
                        <td>
                            {{ $boletin->professor->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.turma') }}
                        </th>
                        <td>
                            {{ $boletin->turma->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.disciplina') }}
                        </th>
                        <td>
                            {{ $boletin->disciplina->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.t_1') }}
                        </th>
                        <td>
                            {{ $boletin->t_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.n_1') }}
                        </th>
                        <td>
                            {{ $boletin->n_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.f_1') }}
                        </th>
                        <td>
                            {{ $boletin->f_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.t_2') }}
                        </th>
                        <td>
                            {{ $boletin->t_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.n_2') }}
                        </th>
                        <td>
                            {{ $boletin->n_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.f_2') }}
                        </th>
                        <td>
                            {{ $boletin->f_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.t_3') }}
                        </th>
                        <td>
                            {{ $boletin->t_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.n_3') }}
                        </th>
                        <td>
                            {{ $boletin->n_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.f_3') }}
                        </th>
                        <td>
                            {{ $boletin->f_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.t_4') }}
                        </th>
                        <td>
                            {{ $boletin->t_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.n_4') }}
                        </th>
                        <td>
                            {{ $boletin->n_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.f_4') }}
                        </th>
                        <td>
                            {{ $boletin->f_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.r_1') }}
                        </th>
                        <td>
                            {{ $boletin->r_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.r_2') }}
                        </th>
                        <td>
                            {{ $boletin->r_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.r_3') }}
                        </th>
                        <td>
                            {{ $boletin->r_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.r_4') }}
                        </th>
                        <td>
                            {{ $boletin->r_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.tr') }}
                        </th>
                        <td>
                            {{ $boletin->tr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.tr_nota') }}
                        </th>
                        <td>
                            {{ $boletin->tr_nota }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.t_falta') }}
                        </th>
                        <td>
                            {{ $boletin->t_falta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.recuperacao') }}
                        </th>
                        <td>
                            {{ $boletin->recuperacao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.resultado') }}
                        </th>
                        <td>
                            {{ $boletin->resultado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.aluno_nome') }}
                        </th>
                        <td>
                            {{ $boletin->aluno_nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.turma_nome') }}
                        </th>
                        <td>
                            {{ $boletin->turma_nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.materia_nome') }}
                        </th>
                        <td>
                            {{ $boletin->materia_nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.abreviado_nome') }}
                        </th>
                        <td>
                            {{ $boletin->abreviado_nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boletin.fields.professor_nome') }}
                        </th>
                        <td>
                            {{ $boletin->professor_nome }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.boletins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection