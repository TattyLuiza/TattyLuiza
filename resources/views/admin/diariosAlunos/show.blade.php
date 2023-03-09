@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.diariosAluno.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.diarios-alunos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.id') }}
                        </th>
                        <td>
                            {{ $diariosAluno->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.diario') }}
                        </th>
                        <td>
                            {{ $diariosAluno->diario->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.matricula') }}
                        </th>
                        <td>
                            {{ $diariosAluno->matricula->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.presenca') }}
                        </th>
                        <td>
                            {{ $diariosAluno->presenca }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.atestado') }}
                        </th>
                        <td>
                            {!! $diariosAluno->atestado !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.obs') }}
                        </th>
                        <td>
                            {!! $diariosAluno->obs !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.status') }}
                        </th>
                        <td>
                            {{ $diariosAluno->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.arquivo') }}
                        </th>
                        <td>
                            {{ $diariosAluno->arquivo }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.diarios-alunos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection