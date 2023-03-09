@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.banco.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bancos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.id') }}
                        </th>
                        <td>
                            {{ $banco->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.padrao') }}
                        </th>
                        <td>
                            {{ $banco->padrao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.listar') }}
                        </th>
                        <td>
                            {{ $banco->listar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.cod') }}
                        </th>
                        <td>
                            {{ $banco->cod }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.nome') }}
                        </th>
                        <td>
                            {{ $banco->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.beneficiario') }}
                        </th>
                        <td>
                            {{ $banco->beneficiario }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.cnpj') }}
                        </th>
                        <td>
                            {{ $banco->cnpj }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.banco') }}
                        </th>
                        <td>
                            {{ $banco->banco }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.taxa') }}
                        </th>
                        <td>
                            {{ $banco->taxa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.agencia') }}
                        </th>
                        <td>
                            {{ $banco->agencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.agencia_dv') }}
                        </th>
                        <td>
                            {{ $banco->agencia_dv }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.conta') }}
                        </th>
                        <td>
                            {{ $banco->conta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.conta_dv') }}
                        </th>
                        <td>
                            {{ $banco->conta_dv }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.cedente') }}
                        </th>
                        <td>
                            {{ $banco->cedente }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.cedente_dv') }}
                        </th>
                        <td>
                            {{ $banco->cedente_dv }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.carteira') }}
                        </th>
                        <td>
                            {{ $banco->carteira }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.arquivo') }}
                        </th>
                        <td>
                            {{ $banco->arquivo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.instrucoes') }}
                        </th>
                        <td>
                            {!! $banco->instrucoes !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bancos.index') }}">
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
            <a class="nav-link" href="#banco_turmas" role="tab" data-toggle="tab">
                {{ trans('cruds.turma.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="banco_turmas">
            @includeIf('admin.bancos.relationships.bancoTurmas', ['turmas' => $banco->bancoTurmas])
        </div>
    </div>
</div>

@endsection