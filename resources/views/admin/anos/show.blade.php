@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ano.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.anos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.id') }}
                        </th>
                        <td>
                            {{ $ano->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.ano') }}
                        </th>
                        <td>
                            {{ $ano->ano }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.logomarca') }}
                        </th>
                        <td>
                            {{ $ano->logomarca }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.escola') }}
                        </th>
                        <td>
                            {{ $ano->escola }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.cnpj') }}
                        </th>
                        <td>
                            {{ $ano->cnpj }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_1') }}
                        </th>
                        <td>
                            {{ $ano->portaria_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_2') }}
                        </th>
                        <td>
                            {{ $ano->portaria_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_3') }}
                        </th>
                        <td>
                            {{ $ano->portaria_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_4') }}
                        </th>
                        <td>
                            {{ $ano->portaria_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_5') }}
                        </th>
                        <td>
                            {{ $ano->portaria_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_6') }}
                        </th>
                        <td>
                            {{ $ano->portaria_6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.rua') }}
                        </th>
                        <td>
                            {{ $ano->rua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.bairro') }}
                        </th>
                        <td>
                            {{ $ano->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.cep') }}
                        </th>
                        <td>
                            {{ $ano->cep }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.telefones') }}
                        </th>
                        <td>
                            {{ $ano->telefones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.cidade') }}
                        </th>
                        <td>
                            {{ $ano->cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.email') }}
                        </th>
                        <td>
                            {{ $ano->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.url') }}
                        </th>
                        <td>
                            {{ $ano->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.boletim') }}
                        </th>
                        <td>
                            {{ $ano->boletim }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.falta') }}
                        </th>
                        <td>
                            {{ $ano->falta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.bim_1') }}
                        </th>
                        <td>
                            {{ $ano->bim_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.bim_2') }}
                        </th>
                        <td>
                            {{ $ano->bim_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.bim_3') }}
                        </th>
                        <td>
                            {{ $ano->bim_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.bim_4') }}
                        </th>
                        <td>
                            {{ $ano->bim_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.valor_1') }}
                        </th>
                        <td>
                            {{ $ano->valor_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.desc_1') }}
                        </th>
                        <td>
                            {{ $ano->desc_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.valor_2') }}
                        </th>
                        <td>
                            {{ $ano->valor_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.desc_2') }}
                        </th>
                        <td>
                            {{ $ano->desc_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.valor_3') }}
                        </th>
                        <td>
                            {{ $ano->valor_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.desc_3') }}
                        </th>
                        <td>
                            {{ $ano->desc_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.valor_4') }}
                        </th>
                        <td>
                            {{ $ano->valor_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.desc_4') }}
                        </th>
                        <td>
                            {{ $ano->desc_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.valor_5') }}
                        </th>
                        <td>
                            {{ $ano->valor_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.desc_5') }}
                        </th>
                        <td>
                            {{ $ano->desc_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.prof_recado') }}
                        </th>
                        <td>
                            {{ $ano->prof_recado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.prof_tarefa') }}
                        </th>
                        <td>
                            {{ $ano->prof_tarefa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.datai_1') }}
                        </th>
                        <td>
                            {{ $ano->datai_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.dataf_1') }}
                        </th>
                        <td>
                            {{ $ano->dataf_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.datai_2') }}
                        </th>
                        <td>
                            {{ $ano->datai_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.dataf_2') }}
                        </th>
                        <td>
                            {{ $ano->dataf_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.datai_3') }}
                        </th>
                        <td>
                            {{ $ano->datai_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.dataf_3') }}
                        </th>
                        <td>
                            {{ $ano->dataf_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.datai_4') }}
                        </th>
                        <td>
                            {{ $ano->datai_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.dataf_4') }}
                        </th>
                        <td>
                            {{ $ano->dataf_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.diapgto') }}
                        </th>
                        <td>
                            {{ $ano->diapgto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.mora_1') }}
                        </th>
                        <td>
                            {{ $ano->mora_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.multa_1') }}
                        </th>
                        <td>
                            {{ $ano->multa_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.instrucao_1') }}
                        </th>
                        <td>
                            {{ $ano->instrucao_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.mora_2') }}
                        </th>
                        <td>
                            {{ $ano->mora_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.multa_2') }}
                        </th>
                        <td>
                            {{ $ano->multa_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.instrucao_2') }}
                        </th>
                        <td>
                            {{ $ano->instrucao_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.mora_3') }}
                        </th>
                        <td>
                            {{ $ano->mora_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.multa_3') }}
                        </th>
                        <td>
                            {{ $ano->multa_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.instrucao_3') }}
                        </th>
                        <td>
                            {{ $ano->instrucao_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.mora_4') }}
                        </th>
                        <td>
                            {{ $ano->mora_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.multa_4') }}
                        </th>
                        <td>
                            {{ $ano->multa_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.instrucao_4') }}
                        </th>
                        <td>
                            {{ $ano->instrucao_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ano.fields.dia_vencimento') }}
                        </th>
                        <td>
                            {{ $ano->dia_vencimento }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.anos.index') }}">
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
            <a class="nav-link" href="#ano_matriculas" role="tab" data-toggle="tab">
                {{ trans('cruds.matricula.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="ano_matriculas">
            @includeIf('admin.anos.relationships.anoMatriculas', ['matriculas' => $ano->anoMatriculas])
        </div>
    </div>
</div>

@endsection