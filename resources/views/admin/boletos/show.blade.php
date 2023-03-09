@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.boleto.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.boletos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.id') }}
                        </th>
                        <td>
                            {{ $boleto->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.banco') }}
                        </th>
                        <td>
                            {{ $boleto->banco->conta ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.matricula') }}
                        </th>
                        <td>
                            {{ $boleto->matricula->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.turma') }}
                        </th>
                        <td>
                            {{ $boleto->turma->tipo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.movimento') }}
                        </th>
                        <td>
                            {{ $boleto->movimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.descricao') }}
                        </th>
                        <td>
                            {{ $boleto->descricao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.parcela') }}
                        </th>
                        <td>
                            {{ $boleto->parcela }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.valor') }}
                        </th>
                        <td>
                            {{ $boleto->valor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.recebido') }}
                        </th>
                        <td>
                            {{ $boleto->recebido }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.datadesconto') }}
                        </th>
                        <td>
                            {{ $boleto->datadesconto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.valordesconto') }}
                        </th>
                        <td>
                            {{ $boleto->valordesconto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.instrucoes') }}
                        </th>
                        <td>
                            {{ $boleto->instrucoes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.status') }}
                        </th>
                        <td>
                            {{ $boleto->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.tipo') }}
                        </th>
                        <td>
                            {{ $boleto->tipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.mora') }}
                        </th>
                        <td>
                            {{ $boleto->mora }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.multa') }}
                        </th>
                        <td>
                            {{ $boleto->multa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.vencimento') }}
                        </th>
                        <td>
                            {{ $boleto->vencimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boleto.fields.data') }}
                        </th>
                        <td>
                            {{ $boleto->data }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.boletos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection