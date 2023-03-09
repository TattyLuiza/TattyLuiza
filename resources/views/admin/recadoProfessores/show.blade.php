@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.recadoProfessore.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.recado-professores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.id') }}
                        </th>
                        <td>
                            {{ $recadoProfessore->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.id_remetente') }}
                        </th>
                        <td>
                            @foreach($recadoProfessore->id_remetentes as $key => $id_remetente)
                                <span class="label label-info">{{ $id_remetente->nome }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.titulo') }}
                        </th>
                        <td>
                            {{ $recadoProfessore->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.texto') }}
                        </th>
                        <td>
                            {!! $recadoProfessore->texto !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.leu') }}
                        </th>
                        <td>
                            {{ $recadoProfessore->leu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.lida_at') }}
                        </th>
                        <td>
                            {{ $recadoProfessore->lida_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.id_destinatario') }}
                        </th>
                        <td>
                            {{ $recadoProfessore->id_destinatario->nome ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.recado-professores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection