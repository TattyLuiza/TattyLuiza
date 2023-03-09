@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.emailsEnviado.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.emails-enviados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.emailsEnviado.fields.id') }}
                        </th>
                        <td>
                            {{ $emailsEnviado->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailsEnviado.fields.id_email') }}
                        </th>
                        <td>
                            @foreach($emailsEnviado->id_emails as $key => $id_email)
                                <span class="label label-info">{{ $id_email->nome }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailsEnviado.fields.nome') }}
                        </th>
                        <td>
                            {{ $emailsEnviado->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailsEnviado.fields.email') }}
                        </th>
                        <td>
                            {{ $emailsEnviado->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailsEnviado.fields.clicou') }}
                        </th>
                        <td>
                            {{ $emailsEnviado->clicou }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailsEnviado.fields.status') }}
                        </th>
                        <td>
                            {{ $emailsEnviado->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.emails-enviados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection