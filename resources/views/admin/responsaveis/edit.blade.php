@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.responsavei.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.responsaveis.update", [$responsavei->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.responsavei.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $responsavei->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rg">{{ trans('cruds.responsavei.fields.rg') }}</label>
                <input class="form-control {{ $errors->has('rg') ? 'is-invalid' : '' }}" type="text" name="rg" id="rg" value="{{ old('rg', $responsavei->rg) }}" required>
                @if($errors->has('rg'))
                    <span class="text-danger">{{ $errors->first('rg') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.rg_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cpf">{{ trans('cruds.responsavei.fields.cpf') }}</label>
                <input class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}" type="text" name="cpf" id="cpf" value="{{ old('cpf', $responsavei->cpf) }}" required>
                @if($errors->has('cpf'))
                    <span class="text-danger">{{ $errors->first('cpf') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.cpf_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nascimento">{{ trans('cruds.responsavei.fields.nascimento') }}</label>
                <input class="form-control date {{ $errors->has('nascimento') ? 'is-invalid' : '' }}" type="text" name="nascimento" id="nascimento" value="{{ old('nascimento', $responsavei->nascimento) }}">
                @if($errors->has('nascimento'))
                    <span class="text-danger">{{ $errors->first('nascimento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.nascimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rua">{{ trans('cruds.responsavei.fields.rua') }}</label>
                <input class="form-control {{ $errors->has('rua') ? 'is-invalid' : '' }}" type="text" name="rua" id="rua" value="{{ old('rua', $responsavei->rua) }}">
                @if($errors->has('rua'))
                    <span class="text-danger">{{ $errors->first('rua') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.rua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="complemento">{{ trans('cruds.responsavei.fields.complemento') }}</label>
                <input class="form-control {{ $errors->has('complemento') ? 'is-invalid' : '' }}" type="text" name="complemento" id="complemento" value="{{ old('complemento', $responsavei->complemento) }}">
                @if($errors->has('complemento'))
                    <span class="text-danger">{{ $errors->first('complemento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.complemento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero">{{ trans('cruds.responsavei.fields.numero') }}</label>
                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="text" name="numero" id="numero" value="{{ old('numero', $responsavei->numero) }}">
                @if($errors->has('numero'))
                    <span class="text-danger">{{ $errors->first('numero') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.numero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bairro">{{ trans('cruds.responsavei.fields.bairro') }}</label>
                <input class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text" name="bairro" id="bairro" value="{{ old('bairro', $responsavei->bairro) }}">
                @if($errors->has('bairro'))
                    <span class="text-danger">{{ $errors->first('bairro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.bairro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cidade">{{ trans('cruds.responsavei.fields.cidade') }}</label>
                <input class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text" name="cidade" id="cidade" value="{{ old('cidade', $responsavei->cidade) }}">
                @if($errors->has('cidade'))
                    <span class="text-danger">{{ $errors->first('cidade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.cidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estado">{{ trans('cruds.responsavei.fields.estado') }}</label>
                <input class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" type="text" name="estado" id="estado" value="{{ old('estado', $responsavei->estado) }}">
                @if($errors->has('estado'))
                    <span class="text-danger">{{ $errors->first('estado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cep">{{ trans('cruds.responsavei.fields.cep') }}</label>
                <input class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}" type="text" name="cep" id="cep" value="{{ old('cep', $responsavei->cep) }}">
                @if($errors->has('cep'))
                    <span class="text-danger">{{ $errors->first('cep') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.cep_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nacionalidade">{{ trans('cruds.responsavei.fields.nacionalidade') }}</label>
                <input class="form-control {{ $errors->has('nacionalidade') ? 'is-invalid' : '' }}" type="text" name="nacionalidade" id="nacionalidade" value="{{ old('nacionalidade', $responsavei->nacionalidade) }}">
                @if($errors->has('nacionalidade'))
                    <span class="text-danger">{{ $errors->first('nacionalidade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.nacionalidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefone">{{ trans('cruds.responsavei.fields.telefone') }}</label>
                <input class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" type="text" name="telefone" id="telefone" value="{{ old('telefone', $responsavei->telefone) }}">
                @if($errors->has('telefone'))
                    <span class="text-danger">{{ $errors->first('telefone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.telefone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="celular">{{ trans('cruds.responsavei.fields.celular') }}</label>
                <input class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}" type="text" name="celular" id="celular" value="{{ old('celular', $responsavei->celular) }}">
                @if($errors->has('celular'))
                    <span class="text-danger">{{ $errors->first('celular') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.celular_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.responsavei.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $responsavei->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="senha">{{ trans('cruds.responsavei.fields.senha') }}</label>
                <input class="form-control {{ $errors->has('senha') ? 'is-invalid' : '' }}" type="password" name="senha" id="senha">
                @if($errors->has('senha'))
                    <span class="text-danger">{{ $errors->first('senha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.senha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instrucao">{{ trans('cruds.responsavei.fields.instrucao') }}</label>
                <input class="form-control {{ $errors->has('instrucao') ? 'is-invalid' : '' }}" type="text" name="instrucao" id="instrucao" value="{{ old('instrucao', $responsavei->instrucao) }}">
                @if($errors->has('instrucao'))
                    <span class="text-danger">{{ $errors->first('instrucao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.instrucao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profissao">{{ trans('cruds.responsavei.fields.profissao') }}</label>
                <input class="form-control {{ $errors->has('profissao') ? 'is-invalid' : '' }}" type="text" name="profissao" id="profissao" value="{{ old('profissao', $responsavei->profissao) }}">
                @if($errors->has('profissao'))
                    <span class="text-danger">{{ $errors->first('profissao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.profissao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="trabalho">{{ trans('cruds.responsavei.fields.trabalho') }}</label>
                <input class="form-control {{ $errors->has('trabalho') ? 'is-invalid' : '' }}" type="text" name="trabalho" id="trabalho" value="{{ old('trabalho', $responsavei->trabalho) }}">
                @if($errors->has('trabalho'))
                    <span class="text-danger">{{ $errors->first('trabalho') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.trabalho_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fonetrabalho">{{ trans('cruds.responsavei.fields.fonetrabalho') }}</label>
                <input class="form-control {{ $errors->has('fonetrabalho') ? 'is-invalid' : '' }}" type="text" name="fonetrabalho" id="fonetrabalho" value="{{ old('fonetrabalho', $responsavei->fonetrabalho) }}">
                @if($errors->has('fonetrabalho'))
                    <span class="text-danger">{{ $errors->first('fonetrabalho') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.fonetrabalho_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.responsavei.fields.sexo') }}</label>
                <select class="form-control {{ $errors->has('sexo') ? 'is-invalid' : '' }}" name="sexo" id="sexo">
                    <option value disabled {{ old('sexo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Responsavei::SEXO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sexo', $responsavei->sexo) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sexo'))
                    <span class="text-danger">{{ $errors->first('sexo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.sexo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obs">{{ trans('cruds.responsavei.fields.obs') }}</label>
                <textarea class="form-control {{ $errors->has('obs') ? 'is-invalid' : '' }}" name="obs" id="obs">{{ old('obs', $responsavei->obs) }}</textarea>
                @if($errors->has('obs'))
                    <span class="text-danger">{{ $errors->first('obs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.responsavei.fields.obs_helper') }}</span>
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