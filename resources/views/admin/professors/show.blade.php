@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.professor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.professors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.id') }}
                        </th>
                        <td>
                            {{ $professor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.foto') }}
                        </th>
                        <td>
                            @if($professor->foto)
                                <a href="{{ $professor->foto->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $professor->foto->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.status') }}
                        </th>
                        <td>
                            {{ $professor->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.user') }}
                        </th>
                        <td>
                            {{ $professor->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.senha') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.cargo') }}
                        </th>
                        <td>
                            {{ $professor->cargo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.banco') }}
                        </th>
                        <td>
                            {{ $professor->banco }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.pis') }}
                        </th>
                        <td>
                            {{ $professor->pis }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.ctps') }}
                        </th>
                        <td>
                            {{ $professor->ctps }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.admissao') }}
                        </th>
                        <td>
                            {{ $professor->admissao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.cpf') }}
                        </th>
                        <td>
                            {{ $professor->cpf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.rg') }}
                        </th>
                        <td>
                            {{ $professor->rg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.nome') }}
                        </th>
                        <td>
                            {{ $professor->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.nascimento') }}
                        </th>
                        <td>
                            {{ $professor->nascimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.naturalidade') }}
                        </th>
                        <td>
                            {{ $professor->naturalidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.sexo') }}
                        </th>
                        <td>
                            {{ App\Models\Professor::SEXO_SELECT[$professor->sexo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.rua') }}
                        </th>
                        <td>
                            {{ $professor->rua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.numero') }}
                        </th>
                        <td>
                            {{ $professor->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.complemento') }}
                        </th>
                        <td>
                            {{ $professor->complemento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.bairro') }}
                        </th>
                        <td>
                            {{ $professor->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.cep') }}
                        </th>
                        <td>
                            {{ $professor->cep }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.cidade') }}
                        </th>
                        <td>
                            {{ $professor->cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.estado') }}
                        </th>
                        <td>
                            {{ $professor->estado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.telefone') }}
                        </th>
                        <td>
                            {{ $professor->telefone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.celular') }}
                        </th>
                        <td>
                            {{ $professor->celular }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.email') }}
                        </th>
                        <td>
                            {{ $professor->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.professor.fields.obs') }}
                        </th>
                        <td>
                            {{ $professor->obs }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.professors.index') }}">
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
            <a class="nav-link" href="#professor_horario_semanals" role="tab" data-toggle="tab">
                {{ trans('cruds.horarioSemanal.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#professor_diarios" role="tab" data-toggle="tab">
                {{ trans('cruds.diario.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="professor_horario_semanals">
            @includeIf('admin.professors.relationships.professorHorarioSemanals', ['horarioSemanals' => $professor->professorHorarioSemanals])
        </div>
        <div class="tab-pane" role="tabpanel" id="professor_diarios">
            @includeIf('admin.professors.relationships.professorDiarios', ['diarios' => $professor->professorDiarios])
        </div>
    </div>
</div>

@endsection