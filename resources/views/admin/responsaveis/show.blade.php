@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.responsavei.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.responsaveis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.id') }}
                        </th>
                        <td>
                            {{ $responsavei->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.nome') }}
                        </th>
                        <td>
                            {{ $responsavei->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.rg') }}
                        </th>
                        <td>
                            {{ $responsavei->rg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.cpf') }}
                        </th>
                        <td>
                            {{ $responsavei->cpf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.nascimento') }}
                        </th>
                        <td>
                            {{ $responsavei->nascimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.rua') }}
                        </th>
                        <td>
                            {{ $responsavei->rua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.complemento') }}
                        </th>
                        <td>
                            {{ $responsavei->complemento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.numero') }}
                        </th>
                        <td>
                            {{ $responsavei->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.bairro') }}
                        </th>
                        <td>
                            {{ $responsavei->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.cidade') }}
                        </th>
                        <td>
                            {{ $responsavei->cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.estado') }}
                        </th>
                        <td>
                            {{ $responsavei->estado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.cep') }}
                        </th>
                        <td>
                            {{ $responsavei->cep }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.nacionalidade') }}
                        </th>
                        <td>
                            {{ $responsavei->nacionalidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.telefone') }}
                        </th>
                        <td>
                            {{ $responsavei->telefone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.celular') }}
                        </th>
                        <td>
                            {{ $responsavei->celular }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.email') }}
                        </th>
                        <td>
                            {{ $responsavei->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.senha') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.instrucao') }}
                        </th>
                        <td>
                            {{ $responsavei->instrucao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.profissao') }}
                        </th>
                        <td>
                            {{ $responsavei->profissao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.trabalho') }}
                        </th>
                        <td>
                            {{ $responsavei->trabalho }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.fonetrabalho') }}
                        </th>
                        <td>
                            {{ $responsavei->fonetrabalho }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.sexo') }}
                        </th>
                        <td>
                            {{ App\Models\Responsavei::SEXO_SELECT[$responsavei->sexo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsavei.fields.obs') }}
                        </th>
                        <td>
                            {{ $responsavei->obs }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.responsaveis.index') }}">
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
            <a class="nav-link" href="#financeiro_alunos" role="tab" data-toggle="tab">
                {{ trans('cruds.aluno.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#mae_alunos" role="tab" data-toggle="tab">
                {{ trans('cruds.aluno.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#pai_alunos" role="tab" data-toggle="tab">
                {{ trans('cruds.aluno.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#mae_matriculas" role="tab" data-toggle="tab">
                {{ trans('cruds.matricula.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#pai_matriculas" role="tab" data-toggle="tab">
                {{ trans('cruds.matricula.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="financeiro_alunos">
            @includeIf('admin.responsaveis.relationships.financeiroAlunos', ['alunos' => $responsavei->financeiroAlunos])
        </div>
        <div class="tab-pane" role="tabpanel" id="mae_alunos">
            @includeIf('admin.responsaveis.relationships.maeAlunos', ['alunos' => $responsavei->maeAlunos])
        </div>
        <div class="tab-pane" role="tabpanel" id="pai_alunos">
            @includeIf('admin.responsaveis.relationships.paiAlunos', ['alunos' => $responsavei->paiAlunos])
        </div>
        <div class="tab-pane" role="tabpanel" id="mae_matriculas">
            @includeIf('admin.responsaveis.relationships.maeMatriculas', ['matriculas' => $responsavei->maeMatriculas])
        </div>
        <div class="tab-pane" role="tabpanel" id="pai_matriculas">
            @includeIf('admin.responsaveis.relationships.paiMatriculas', ['matriculas' => $responsavei->paiMatriculas])
        </div>
    </div>
</div>

@endsection