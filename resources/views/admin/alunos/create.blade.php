@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.aluno.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.alunos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.aluno.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Aluno::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Sim') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto">{{ trans('cruds.aluno.fields.foto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto') ? 'is-invalid' : '' }}" id="foto-dropzone">
                </div>
                @if($errors->has('foto'))
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.foto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.aluno.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', '') }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.aluno.fields.sexo') }}</label>
                <select class="form-control {{ $errors->has('sexo') ? 'is-invalid' : '' }}" name="sexo" id="sexo">
                    <option value disabled {{ old('sexo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Aluno::SEXO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sexo', 'Feminino') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sexo'))
                    <span class="text-danger">{{ $errors->first('sexo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.sexo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nascimento">{{ trans('cruds.aluno.fields.nascimento') }}</label>
                <input class="form-control date {{ $errors->has('nascimento') ? 'is-invalid' : '' }}" type="text" name="nascimento" id="nascimento" value="{{ old('nascimento') }}">
                @if($errors->has('nascimento'))
                    <span class="text-danger">{{ $errors->first('nascimento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.nascimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cpf">{{ trans('cruds.aluno.fields.cpf') }}</label>
                <input class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}" type="text" name="cpf" id="cpf" value="{{ old('cpf', '') }}">
                @if($errors->has('cpf'))
                    <span class="text-danger">{{ $errors->first('cpf') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.cpf_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rg">{{ trans('cruds.aluno.fields.rg') }}</label>
                <input class="form-control {{ $errors->has('rg') ? 'is-invalid' : '' }}" type="text" name="rg" id="rg" value="{{ old('rg', '') }}">
                @if($errors->has('rg'))
                    <span class="text-danger">{{ $errors->first('rg') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.rg_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nacionalidade">{{ trans('cruds.aluno.fields.nacionalidade') }}</label>
                <input class="form-control {{ $errors->has('nacionalidade') ? 'is-invalid' : '' }}" type="text" name="nacionalidade" id="nacionalidade" value="{{ old('nacionalidade', '') }}">
                @if($errors->has('nacionalidade'))
                    <span class="text-danger">{{ $errors->first('nacionalidade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.nacionalidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="naturalidade">{{ trans('cruds.aluno.fields.naturalidade') }}</label>
                <input class="form-control {{ $errors->has('naturalidade') ? 'is-invalid' : '' }}" type="text" name="naturalidade" id="naturalidade" value="{{ old('naturalidade', '') }}">
                @if($errors->has('naturalidade'))
                    <span class="text-danger">{{ $errors->first('naturalidade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.naturalidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cep">{{ trans('cruds.aluno.fields.cep') }}</label>
                <input class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}" type="text" name="cep" id="cep" value="{{ old('cep', '') }}">
                @if($errors->has('cep'))
                    <span class="text-danger">{{ $errors->first('cep') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.cep_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rua">{{ trans('cruds.aluno.fields.rua') }}</label>
                <input class="form-control {{ $errors->has('rua') ? 'is-invalid' : '' }}" type="text" name="rua" id="rua" value="{{ old('rua', '') }}">
                @if($errors->has('rua'))
                    <span class="text-danger">{{ $errors->first('rua') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.rua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero">{{ trans('cruds.aluno.fields.numero') }}</label>
                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="text" name="numero" id="numero" value="{{ old('numero', '') }}">
                @if($errors->has('numero'))
                    <span class="text-danger">{{ $errors->first('numero') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.numero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="complemento">{{ trans('cruds.aluno.fields.complemento') }}</label>
                <input class="form-control {{ $errors->has('complemento') ? 'is-invalid' : '' }}" type="text" name="complemento" id="complemento" value="{{ old('complemento', '') }}">
                @if($errors->has('complemento'))
                    <span class="text-danger">{{ $errors->first('complemento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.complemento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bairro">{{ trans('cruds.aluno.fields.bairro') }}</label>
                <input class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text" name="bairro" id="bairro" value="{{ old('bairro', '') }}">
                @if($errors->has('bairro'))
                    <span class="text-danger">{{ $errors->first('bairro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.bairro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cidade">{{ trans('cruds.aluno.fields.cidade') }}</label>
                <input class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text" name="cidade" id="cidade" value="{{ old('cidade', '') }}">
                @if($errors->has('cidade'))
                    <span class="text-danger">{{ $errors->first('cidade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.cidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estado">{{ trans('cruds.aluno.fields.estado') }}</label>
                <input class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" type="text" name="estado" id="estado" value="{{ old('estado', '') }}">
                @if($errors->has('estado'))
                    <span class="text-danger">{{ $errors->first('estado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mae_id">{{ trans('cruds.aluno.fields.mae') }}</label>
                <select class="form-control select2 {{ $errors->has('mae') ? 'is-invalid' : '' }}" name="mae_id" id="mae_id">
                    @foreach($maes as $id => $entry)
                        <option value="{{ $id }}" {{ old('mae_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('mae'))
                    <span class="text-danger">{{ $errors->first('mae') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.mae_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pai_id">{{ trans('cruds.aluno.fields.pai') }}</label>
                <select class="form-control select2 {{ $errors->has('pai') ? 'is-invalid' : '' }}" name="pai_id" id="pai_id">
                    @foreach($pais as $id => $entry)
                        <option value="{{ $id }}" {{ old('pai_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pai'))
                    <span class="text-danger">{{ $errors->first('pai') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.pai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="financeiro_id">{{ trans('cruds.aluno.fields.financeiro') }}</label>
                <select class="form-control select2 {{ $errors->has('financeiro') ? 'is-invalid' : '' }}" name="financeiro_id" id="financeiro_id">
                    @foreach($financeiros as $id => $entry)
                        <option value="{{ $id }}" {{ old('financeiro_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('financeiro'))
                    <span class="text-danger">{{ $errors->first('financeiro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.financeiro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefone">{{ trans('cruds.aluno.fields.telefone') }}</label>
                <input class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" type="text" name="telefone" id="telefone" value="{{ old('telefone', '') }}">
                @if($errors->has('telefone'))
                    <span class="text-danger">{{ $errors->first('telefone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.telefone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="acesso">{{ trans('cruds.aluno.fields.acesso') }}</label>
                <input class="form-control datetime {{ $errors->has('acesso') ? 'is-invalid' : '' }}" type="text" name="acesso" id="acesso" value="{{ old('acesso') }}">
                @if($errors->has('acesso'))
                    <span class="text-danger">{{ $errors->first('acesso') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.acesso_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.aluno.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="senha">{{ trans('cruds.aluno.fields.senha') }}</label>
                <input class="form-control {{ $errors->has('senha') ? 'is-invalid' : '' }}" type="password" name="senha" id="senha">
                @if($errors->has('senha'))
                    <span class="text-danger">{{ $errors->first('senha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.senha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="categoria">{{ trans('cruds.aluno.fields.categoria') }}</label>
                <input class="form-control {{ $errors->has('categoria') ? 'is-invalid' : '' }}" type="text" name="categoria" id="categoria" value="{{ old('categoria', '') }}">
                @if($errors->has('categoria'))
                    <span class="text-danger">{{ $errors->first('categoria') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.categoria_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="frequentar">{{ trans('cruds.aluno.fields.frequentar') }}</label>
                <input class="form-control {{ $errors->has('frequentar') ? 'is-invalid' : '' }}" type="text" name="frequentar" id="frequentar" value="{{ old('frequentar', '') }}">
                @if($errors->has('frequentar'))
                    <span class="text-danger">{{ $errors->first('frequentar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.frequentar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="busca">{{ trans('cruds.aluno.fields.busca') }}</label>
                <input class="form-control {{ $errors->has('busca') ? 'is-invalid' : '' }}" type="text" name="busca" id="busca" value="{{ old('busca', '') }}">
                @if($errors->has('busca'))
                    <span class="text-danger">{{ $errors->first('busca') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.busca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="busca_1">{{ trans('cruds.aluno.fields.busca_1') }}</label>
                <input class="form-control {{ $errors->has('busca_1') ? 'is-invalid' : '' }}" type="text" name="busca_1" id="busca_1" value="{{ old('busca_1', '') }}">
                @if($errors->has('busca_1'))
                    <span class="text-danger">{{ $errors->first('busca_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.busca_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="busca_2">{{ trans('cruds.aluno.fields.busca_2') }}</label>
                <input class="form-control {{ $errors->has('busca_2') ? 'is-invalid' : '' }}" type="text" name="busca_2" id="busca_2" value="{{ old('busca_2', '') }}">
                @if($errors->has('busca_2'))
                    <span class="text-danger">{{ $errors->first('busca_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.busca_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="busca_3">{{ trans('cruds.aluno.fields.busca_3') }}</label>
                <input class="form-control {{ $errors->has('busca_3') ? 'is-invalid' : '' }}" type="text" name="busca_3" id="busca_3" value="{{ old('busca_3', '') }}">
                @if($errors->has('busca_3'))
                    <span class="text-danger">{{ $errors->first('busca_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.busca_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="busca_4">{{ trans('cruds.aluno.fields.busca_4') }}</label>
                <input class="form-control {{ $errors->has('busca_4') ? 'is-invalid' : '' }}" type="text" name="busca_4" id="busca_4" value="{{ old('busca_4', '') }}">
                @if($errors->has('busca_4'))
                    <span class="text-danger">{{ $errors->first('busca_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.busca_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parentesco_1">{{ trans('cruds.aluno.fields.parentesco_1') }}</label>
                <input class="form-control {{ $errors->has('parentesco_1') ? 'is-invalid' : '' }}" type="text" name="parentesco_1" id="parentesco_1" value="{{ old('parentesco_1', '') }}">
                @if($errors->has('parentesco_1'))
                    <span class="text-danger">{{ $errors->first('parentesco_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.parentesco_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parentesco_2">{{ trans('cruds.aluno.fields.parentesco_2') }}</label>
                <input class="form-control {{ $errors->has('parentesco_2') ? 'is-invalid' : '' }}" type="text" name="parentesco_2" id="parentesco_2" value="{{ old('parentesco_2', '') }}">
                @if($errors->has('parentesco_2'))
                    <span class="text-danger">{{ $errors->first('parentesco_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.parentesco_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parentesco_3">{{ trans('cruds.aluno.fields.parentesco_3') }}</label>
                <input class="form-control {{ $errors->has('parentesco_3') ? 'is-invalid' : '' }}" type="text" name="parentesco_3" id="parentesco_3" value="{{ old('parentesco_3', '') }}">
                @if($errors->has('parentesco_3'))
                    <span class="text-danger">{{ $errors->first('parentesco_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.parentesco_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parentesco_4">{{ trans('cruds.aluno.fields.parentesco_4') }}</label>
                <input class="form-control {{ $errors->has('parentesco_4') ? 'is-invalid' : '' }}" type="text" name="parentesco_4" id="parentesco_4" value="{{ old('parentesco_4', '') }}">
                @if($errors->has('parentesco_4'))
                    <span class="text-danger">{{ $errors->first('parentesco_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.parentesco_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_1">{{ trans('cruds.aluno.fields.desc_1') }}</label>
                <input class="form-control {{ $errors->has('desc_1') ? 'is-invalid' : '' }}" type="text" name="desc_1" id="desc_1" value="{{ old('desc_1', '') }}">
                @if($errors->has('desc_1'))
                    <span class="text-danger">{{ $errors->first('desc_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.desc_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_2">{{ trans('cruds.aluno.fields.desc_2') }}</label>
                <input class="form-control {{ $errors->has('desc_2') ? 'is-invalid' : '' }}" type="text" name="desc_2" id="desc_2" value="{{ old('desc_2', '') }}">
                @if($errors->has('desc_2'))
                    <span class="text-danger">{{ $errors->first('desc_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.desc_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_3">{{ trans('cruds.aluno.fields.desc_3') }}</label>
                <input class="form-control {{ $errors->has('desc_3') ? 'is-invalid' : '' }}" type="text" name="desc_3" id="desc_3" value="{{ old('desc_3', '') }}">
                @if($errors->has('desc_3'))
                    <span class="text-danger">{{ $errors->first('desc_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.desc_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_4">{{ trans('cruds.aluno.fields.desc_4') }}</label>
                <input class="form-control {{ $errors->has('desc_4') ? 'is-invalid' : '' }}" type="text" name="desc_4" id="desc_4" value="{{ old('desc_4', '') }}">
                @if($errors->has('desc_4'))
                    <span class="text-danger">{{ $errors->first('desc_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.desc_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_5">{{ trans('cruds.aluno.fields.desc_5') }}</label>
                <input class="form-control {{ $errors->has('desc_5') ? 'is-invalid' : '' }}" type="text" name="desc_5" id="desc_5" value="{{ old('desc_5', '') }}">
                @if($errors->has('desc_5'))
                    <span class="text-danger">{{ $errors->first('desc_5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.desc_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diavencimento">{{ trans('cruds.aluno.fields.diavencimento') }}</label>
                <input class="form-control {{ $errors->has('diavencimento') ? 'is-invalid' : '' }}" type="number" name="diavencimento" id="diavencimento" value="{{ old('diavencimento', '') }}" step="1">
                @if($errors->has('diavencimento'))
                    <span class="text-danger">{{ $errors->first('diavencimento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.diavencimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alergia">{{ trans('cruds.aluno.fields.alergia') }}</label>
                <textarea class="form-control {{ $errors->has('alergia') ? 'is-invalid' : '' }}" name="alergia" id="alergia">{{ old('alergia') }}</textarea>
                @if($errors->has('alergia'))
                    <span class="text-danger">{{ $errors->first('alergia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.alergia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="convulsao">{{ trans('cruds.aluno.fields.convulsao') }}</label>
                <textarea class="form-control {{ $errors->has('convulsao') ? 'is-invalid' : '' }}" name="convulsao" id="convulsao">{{ old('convulsao') }}</textarea>
                @if($errors->has('convulsao'))
                    <span class="text-danger">{{ $errors->first('convulsao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.convulsao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pronto_socorro">{{ trans('cruds.aluno.fields.pronto_socorro') }}</label>
                <textarea class="form-control {{ $errors->has('pronto_socorro') ? 'is-invalid' : '' }}" name="pronto_socorro" id="pronto_socorro">{{ old('pronto_socorro') }}</textarea>
                @if($errors->has('pronto_socorro'))
                    <span class="text-danger">{{ $errors->first('pronto_socorro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.pronto_socorro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remedio">{{ trans('cruds.aluno.fields.remedio') }}</label>
                <textarea class="form-control {{ $errors->has('remedio') ? 'is-invalid' : '' }}" name="remedio" id="remedio">{{ old('remedio') }}</textarea>
                @if($errors->has('remedio'))
                    <span class="text-danger">{{ $errors->first('remedio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.remedio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fala">{{ trans('cruds.aluno.fields.fala') }}</label>
                <textarea class="form-control {{ $errors->has('fala') ? 'is-invalid' : '' }}" name="fala" id="fala">{{ old('fala') }}</textarea>
                @if($errors->has('fala'))
                    <span class="text-danger">{{ $errors->first('fala') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.fala_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="audicao">{{ trans('cruds.aluno.fields.audicao') }}</label>
                <textarea class="form-control {{ $errors->has('audicao') ? 'is-invalid' : '' }}" name="audicao" id="audicao">{{ old('audicao') }}</textarea>
                @if($errors->has('audicao'))
                    <span class="text-danger">{{ $errors->first('audicao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.audicao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="febre">{{ trans('cruds.aluno.fields.febre') }}</label>
                <textarea class="form-control {{ $errors->has('febre') ? 'is-invalid' : '' }}" name="febre" id="febre">{{ old('febre') }}</textarea>
                @if($errors->has('febre'))
                    <span class="text-danger">{{ $errors->first('febre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.febre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="convenio">{{ trans('cruds.aluno.fields.convenio') }}</label>
                <textarea class="form-control {{ $errors->has('convenio') ? 'is-invalid' : '' }}" name="convenio" id="convenio">{{ old('convenio') }}</textarea>
                @if($errors->has('convenio'))
                    <span class="text-danger">{{ $errors->first('convenio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.convenio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recomendacao">{{ trans('cruds.aluno.fields.recomendacao') }}</label>
                <textarea class="form-control {{ $errors->has('recomendacao') ? 'is-invalid' : '' }}" name="recomendacao" id="recomendacao">{{ old('recomendacao') }}</textarea>
                @if($errors->has('recomendacao'))
                    <span class="text-danger">{{ $errors->first('recomendacao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.recomendacao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="natacao">{{ trans('cruds.aluno.fields.natacao') }}</label>
                <textarea class="form-control {{ $errors->has('natacao') ? 'is-invalid' : '' }}" name="natacao" id="natacao">{{ old('natacao') }}</textarea>
                @if($errors->has('natacao'))
                    <span class="text-danger">{{ $errors->first('natacao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.natacao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obs">{{ trans('cruds.aluno.fields.obs') }}</label>
                <textarea class="form-control {{ $errors->has('obs') ? 'is-invalid' : '' }}" name="obs" id="obs">{{ old('obs') }}</textarea>
                @if($errors->has('obs'))
                    <span class="text-danger">{{ $errors->first('obs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.aluno.fields.obs_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.fotoDropzone = {
    url: '{{ route('admin.alunos.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto"]').remove()
      $('form').append('<input type="hidden" name="foto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($aluno) && $aluno->foto)
      var file = {!! json_encode($aluno->foto) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection