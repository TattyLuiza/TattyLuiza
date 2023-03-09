@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.aluno.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alunos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.id') }}
                        </th>
                        <td>
                            {{ $aluno->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Aluno::STATUS_SELECT[$aluno->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.foto') }}
                        </th>
                        <td>
                            @if($aluno->foto)
                                <a href="{{ $aluno->foto->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $aluno->foto->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.nome') }}
                        </th>
                        <td>
                            {{ $aluno->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.sexo') }}
                        </th>
                        <td>
                            {{ App\Models\Aluno::SEXO_SELECT[$aluno->sexo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.nascimento') }}
                        </th>
                        <td>
                            {{ $aluno->nascimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.cpf') }}
                        </th>
                        <td>
                            {{ $aluno->cpf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.rg') }}
                        </th>
                        <td>
                            {{ $aluno->rg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.nacionalidade') }}
                        </th>
                        <td>
                            {{ $aluno->nacionalidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.naturalidade') }}
                        </th>
                        <td>
                            {{ $aluno->naturalidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.cep') }}
                        </th>
                        <td>
                            {{ $aluno->cep }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.rua') }}
                        </th>
                        <td>
                            {{ $aluno->rua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.numero') }}
                        </th>
                        <td>
                            {{ $aluno->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.complemento') }}
                        </th>
                        <td>
                            {{ $aluno->complemento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.bairro') }}
                        </th>
                        <td>
                            {{ $aluno->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.cidade') }}
                        </th>
                        <td>
                            {{ $aluno->cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.estado') }}
                        </th>
                        <td>
                            {{ $aluno->estado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.mae') }}
                        </th>
                        <td>
                            {{ $aluno->mae->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.pai') }}
                        </th>
                        <td>
                            {{ $aluno->pai->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.financeiro') }}
                        </th>
                        <td>
                            {{ $aluno->financeiro->nome ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.telefone') }}
                        </th>
                        <td>
                            {{ $aluno->telefone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.acesso') }}
                        </th>
                        <td>
                            {{ $aluno->acesso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.email') }}
                        </th>
                        <td>
                            {{ $aluno->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.categoria') }}
                        </th>
                        <td>
                            {{ $aluno->categoria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.frequentar') }}
                        </th>
                        <td>
                            {{ $aluno->frequentar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.busca') }}
                        </th>
                        <td>
                            {{ $aluno->busca }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.busca_1') }}
                        </th>
                        <td>
                            {{ $aluno->busca_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.busca_2') }}
                        </th>
                        <td>
                            {{ $aluno->busca_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.busca_3') }}
                        </th>
                        <td>
                            {{ $aluno->busca_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.busca_4') }}
                        </th>
                        <td>
                            {{ $aluno->busca_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.parentesco_1') }}
                        </th>
                        <td>
                            {{ $aluno->parentesco_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.parentesco_2') }}
                        </th>
                        <td>
                            {{ $aluno->parentesco_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.parentesco_3') }}
                        </th>
                        <td>
                            {{ $aluno->parentesco_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.parentesco_4') }}
                        </th>
                        <td>
                            {{ $aluno->parentesco_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.desc_1') }}
                        </th>
                        <td>
                            {{ $aluno->desc_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.desc_2') }}
                        </th>
                        <td>
                            {{ $aluno->desc_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.desc_3') }}
                        </th>
                        <td>
                            {{ $aluno->desc_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.desc_4') }}
                        </th>
                        <td>
                            {{ $aluno->desc_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.desc_5') }}
                        </th>
                        <td>
                            {{ $aluno->desc_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.diavencimento') }}
                        </th>
                        <td>
                            {{ $aluno->diavencimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.alergia') }}
                        </th>
                        <td>
                            {{ $aluno->alergia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.convulsao') }}
                        </th>
                        <td>
                            {{ $aluno->convulsao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.pronto_socorro') }}
                        </th>
                        <td>
                            {{ $aluno->pronto_socorro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.remedio') }}
                        </th>
                        <td>
                            {{ $aluno->remedio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.fala') }}
                        </th>
                        <td>
                            {{ $aluno->fala }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.audicao') }}
                        </th>
                        <td>
                            {{ $aluno->audicao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.febre') }}
                        </th>
                        <td>
                            {{ $aluno->febre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.convenio') }}
                        </th>
                        <td>
                            {{ $aluno->convenio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.recomendacao') }}
                        </th>
                        <td>
                            {{ $aluno->recomendacao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.natacao') }}
                        </th>
                        <td>
                            {{ $aluno->natacao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aluno.fields.obs') }}
                        </th>
                        <td>
                            {{ $aluno->obs }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alunos.index') }}">
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
            <a class="nav-link" href="#aluno_matriculas" role="tab" data-toggle="tab">
                {{ trans('cruds.matricula.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="aluno_matriculas">
            @includeIf('admin.alunos.relationships.alunoMatriculas', ['matriculas' => $aluno->alunoMatriculas])
        </div>
    </div>
</div>

@endsection