@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ano.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.anos.update", [$ano->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="ano">{{ trans('cruds.ano.fields.ano') }}</label>
                <input class="form-control date {{ $errors->has('ano') ? 'is-invalid' : '' }}" type="text" name="ano" id="ano" value="{{ old('ano', $ano->ano) }}" required>
                @if($errors->has('ano'))
                    <span class="text-danger">{{ $errors->first('ano') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.ano_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logomarca">{{ trans('cruds.ano.fields.logomarca') }}</label>
                <input class="form-control {{ $errors->has('logomarca') ? 'is-invalid' : '' }}" type="text" name="logomarca" id="logomarca" value="{{ old('logomarca', $ano->logomarca) }}">
                @if($errors->has('logomarca'))
                    <span class="text-danger">{{ $errors->first('logomarca') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.logomarca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="escola">{{ trans('cruds.ano.fields.escola') }}</label>
                <input class="form-control {{ $errors->has('escola') ? 'is-invalid' : '' }}" type="text" name="escola" id="escola" value="{{ old('escola', $ano->escola) }}">
                @if($errors->has('escola'))
                    <span class="text-danger">{{ $errors->first('escola') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.escola_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cnpj">{{ trans('cruds.ano.fields.cnpj') }}</label>
                <input class="form-control {{ $errors->has('cnpj') ? 'is-invalid' : '' }}" type="text" name="cnpj" id="cnpj" value="{{ old('cnpj', $ano->cnpj) }}">
                @if($errors->has('cnpj'))
                    <span class="text-danger">{{ $errors->first('cnpj') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.cnpj_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="portaria_1">{{ trans('cruds.ano.fields.portaria_1') }}</label>
                <input class="form-control {{ $errors->has('portaria_1') ? 'is-invalid' : '' }}" type="text" name="portaria_1" id="portaria_1" value="{{ old('portaria_1', $ano->portaria_1) }}">
                @if($errors->has('portaria_1'))
                    <span class="text-danger">{{ $errors->first('portaria_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.portaria_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="portaria_2">{{ trans('cruds.ano.fields.portaria_2') }}</label>
                <input class="form-control {{ $errors->has('portaria_2') ? 'is-invalid' : '' }}" type="text" name="portaria_2" id="portaria_2" value="{{ old('portaria_2', $ano->portaria_2) }}">
                @if($errors->has('portaria_2'))
                    <span class="text-danger">{{ $errors->first('portaria_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.portaria_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="portaria_3">{{ trans('cruds.ano.fields.portaria_3') }}</label>
                <input class="form-control {{ $errors->has('portaria_3') ? 'is-invalid' : '' }}" type="text" name="portaria_3" id="portaria_3" value="{{ old('portaria_3', $ano->portaria_3) }}">
                @if($errors->has('portaria_3'))
                    <span class="text-danger">{{ $errors->first('portaria_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.portaria_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="portaria_4">{{ trans('cruds.ano.fields.portaria_4') }}</label>
                <input class="form-control {{ $errors->has('portaria_4') ? 'is-invalid' : '' }}" type="text" name="portaria_4" id="portaria_4" value="{{ old('portaria_4', $ano->portaria_4) }}">
                @if($errors->has('portaria_4'))
                    <span class="text-danger">{{ $errors->first('portaria_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.portaria_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="portaria_5">{{ trans('cruds.ano.fields.portaria_5') }}</label>
                <input class="form-control {{ $errors->has('portaria_5') ? 'is-invalid' : '' }}" type="text" name="portaria_5" id="portaria_5" value="{{ old('portaria_5', $ano->portaria_5) }}">
                @if($errors->has('portaria_5'))
                    <span class="text-danger">{{ $errors->first('portaria_5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.portaria_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="portaria_6">{{ trans('cruds.ano.fields.portaria_6') }}</label>
                <input class="form-control {{ $errors->has('portaria_6') ? 'is-invalid' : '' }}" type="text" name="portaria_6" id="portaria_6" value="{{ old('portaria_6', $ano->portaria_6) }}">
                @if($errors->has('portaria_6'))
                    <span class="text-danger">{{ $errors->first('portaria_6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.portaria_6_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rua">{{ trans('cruds.ano.fields.rua') }}</label>
                <input class="form-control {{ $errors->has('rua') ? 'is-invalid' : '' }}" type="text" name="rua" id="rua" value="{{ old('rua', $ano->rua) }}">
                @if($errors->has('rua'))
                    <span class="text-danger">{{ $errors->first('rua') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.rua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bairro">{{ trans('cruds.ano.fields.bairro') }}</label>
                <input class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text" name="bairro" id="bairro" value="{{ old('bairro', $ano->bairro) }}">
                @if($errors->has('bairro'))
                    <span class="text-danger">{{ $errors->first('bairro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.bairro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cep">{{ trans('cruds.ano.fields.cep') }}</label>
                <input class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}" type="text" name="cep" id="cep" value="{{ old('cep', $ano->cep) }}">
                @if($errors->has('cep'))
                    <span class="text-danger">{{ $errors->first('cep') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.cep_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefones">{{ trans('cruds.ano.fields.telefones') }}</label>
                <input class="form-control {{ $errors->has('telefones') ? 'is-invalid' : '' }}" type="text" name="telefones" id="telefones" value="{{ old('telefones', $ano->telefones) }}">
                @if($errors->has('telefones'))
                    <span class="text-danger">{{ $errors->first('telefones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.telefones_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cidade">{{ trans('cruds.ano.fields.cidade') }}</label>
                <input class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text" name="cidade" id="cidade" value="{{ old('cidade', $ano->cidade) }}">
                @if($errors->has('cidade'))
                    <span class="text-danger">{{ $errors->first('cidade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.cidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.ano.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $ano->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.ano.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', $ano->url) }}">
                @if($errors->has('url'))
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="boletim">{{ trans('cruds.ano.fields.boletim') }}</label>
                <input class="form-control {{ $errors->has('boletim') ? 'is-invalid' : '' }}" type="text" name="boletim" id="boletim" value="{{ old('boletim', $ano->boletim) }}">
                @if($errors->has('boletim'))
                    <span class="text-danger">{{ $errors->first('boletim') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.boletim_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="falta">{{ trans('cruds.ano.fields.falta') }}</label>
                <input class="form-control {{ $errors->has('falta') ? 'is-invalid' : '' }}" type="text" name="falta" id="falta" value="{{ old('falta', $ano->falta) }}">
                @if($errors->has('falta'))
                    <span class="text-danger">{{ $errors->first('falta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.falta_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bim_1">{{ trans('cruds.ano.fields.bim_1') }}</label>
                <input class="form-control {{ $errors->has('bim_1') ? 'is-invalid' : '' }}" type="number" name="bim_1" id="bim_1" value="{{ old('bim_1', $ano->bim_1) }}" step="1" required>
                @if($errors->has('bim_1'))
                    <span class="text-danger">{{ $errors->first('bim_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.bim_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bim_2">{{ trans('cruds.ano.fields.bim_2') }}</label>
                <input class="form-control {{ $errors->has('bim_2') ? 'is-invalid' : '' }}" type="number" name="bim_2" id="bim_2" value="{{ old('bim_2', $ano->bim_2) }}" step="1" required>
                @if($errors->has('bim_2'))
                    <span class="text-danger">{{ $errors->first('bim_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.bim_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bim_3">{{ trans('cruds.ano.fields.bim_3') }}</label>
                <input class="form-control {{ $errors->has('bim_3') ? 'is-invalid' : '' }}" type="number" name="bim_3" id="bim_3" value="{{ old('bim_3', $ano->bim_3) }}" step="1" required>
                @if($errors->has('bim_3'))
                    <span class="text-danger">{{ $errors->first('bim_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.bim_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bim_4">{{ trans('cruds.ano.fields.bim_4') }}</label>
                <input class="form-control {{ $errors->has('bim_4') ? 'is-invalid' : '' }}" type="number" name="bim_4" id="bim_4" value="{{ old('bim_4', $ano->bim_4) }}" step="1" required>
                @if($errors->has('bim_4'))
                    <span class="text-danger">{{ $errors->first('bim_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.bim_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valor_1">{{ trans('cruds.ano.fields.valor_1') }}</label>
                <input class="form-control {{ $errors->has('valor_1') ? 'is-invalid' : '' }}" type="number" name="valor_1" id="valor_1" value="{{ old('valor_1', $ano->valor_1) }}" step="0.01" required>
                @if($errors->has('valor_1'))
                    <span class="text-danger">{{ $errors->first('valor_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.valor_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_1">{{ trans('cruds.ano.fields.desc_1') }}</label>
                <input class="form-control {{ $errors->has('desc_1') ? 'is-invalid' : '' }}" type="text" name="desc_1" id="desc_1" value="{{ old('desc_1', $ano->desc_1) }}">
                @if($errors->has('desc_1'))
                    <span class="text-danger">{{ $errors->first('desc_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.desc_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valor_2">{{ trans('cruds.ano.fields.valor_2') }}</label>
                <input class="form-control {{ $errors->has('valor_2') ? 'is-invalid' : '' }}" type="number" name="valor_2" id="valor_2" value="{{ old('valor_2', $ano->valor_2) }}" step="0.01" required>
                @if($errors->has('valor_2'))
                    <span class="text-danger">{{ $errors->first('valor_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.valor_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_2">{{ trans('cruds.ano.fields.desc_2') }}</label>
                <input class="form-control {{ $errors->has('desc_2') ? 'is-invalid' : '' }}" type="text" name="desc_2" id="desc_2" value="{{ old('desc_2', $ano->desc_2) }}">
                @if($errors->has('desc_2'))
                    <span class="text-danger">{{ $errors->first('desc_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.desc_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valor_3">{{ trans('cruds.ano.fields.valor_3') }}</label>
                <input class="form-control {{ $errors->has('valor_3') ? 'is-invalid' : '' }}" type="number" name="valor_3" id="valor_3" value="{{ old('valor_3', $ano->valor_3) }}" step="0.01" required>
                @if($errors->has('valor_3'))
                    <span class="text-danger">{{ $errors->first('valor_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.valor_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_3">{{ trans('cruds.ano.fields.desc_3') }}</label>
                <input class="form-control {{ $errors->has('desc_3') ? 'is-invalid' : '' }}" type="text" name="desc_3" id="desc_3" value="{{ old('desc_3', $ano->desc_3) }}">
                @if($errors->has('desc_3'))
                    <span class="text-danger">{{ $errors->first('desc_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.desc_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valor_4">{{ trans('cruds.ano.fields.valor_4') }}</label>
                <input class="form-control {{ $errors->has('valor_4') ? 'is-invalid' : '' }}" type="number" name="valor_4" id="valor_4" value="{{ old('valor_4', $ano->valor_4) }}" step="0.01" required>
                @if($errors->has('valor_4'))
                    <span class="text-danger">{{ $errors->first('valor_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.valor_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_4">{{ trans('cruds.ano.fields.desc_4') }}</label>
                <input class="form-control {{ $errors->has('desc_4') ? 'is-invalid' : '' }}" type="text" name="desc_4" id="desc_4" value="{{ old('desc_4', $ano->desc_4) }}">
                @if($errors->has('desc_4'))
                    <span class="text-danger">{{ $errors->first('desc_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.desc_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valor_5">{{ trans('cruds.ano.fields.valor_5') }}</label>
                <input class="form-control {{ $errors->has('valor_5') ? 'is-invalid' : '' }}" type="number" name="valor_5" id="valor_5" value="{{ old('valor_5', $ano->valor_5) }}" step="0.01" required>
                @if($errors->has('valor_5'))
                    <span class="text-danger">{{ $errors->first('valor_5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.valor_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc_5">{{ trans('cruds.ano.fields.desc_5') }}</label>
                <input class="form-control {{ $errors->has('desc_5') ? 'is-invalid' : '' }}" type="text" name="desc_5" id="desc_5" value="{{ old('desc_5', $ano->desc_5) }}">
                @if($errors->has('desc_5'))
                    <span class="text-danger">{{ $errors->first('desc_5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.desc_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="prof_recado">{{ trans('cruds.ano.fields.prof_recado') }}</label>
                <input class="form-control {{ $errors->has('prof_recado') ? 'is-invalid' : '' }}" type="number" name="prof_recado" id="prof_recado" value="{{ old('prof_recado', $ano->prof_recado) }}" step="1" required>
                @if($errors->has('prof_recado'))
                    <span class="text-danger">{{ $errors->first('prof_recado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.prof_recado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="prof_tarefa">{{ trans('cruds.ano.fields.prof_tarefa') }}</label>
                <input class="form-control {{ $errors->has('prof_tarefa') ? 'is-invalid' : '' }}" type="number" name="prof_tarefa" id="prof_tarefa" value="{{ old('prof_tarefa', $ano->prof_tarefa) }}" step="1" required>
                @if($errors->has('prof_tarefa'))
                    <span class="text-danger">{{ $errors->first('prof_tarefa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.prof_tarefa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="datai_1">{{ trans('cruds.ano.fields.datai_1') }}</label>
                <input class="form-control date {{ $errors->has('datai_1') ? 'is-invalid' : '' }}" type="text" name="datai_1" id="datai_1" value="{{ old('datai_1', $ano->datai_1) }}" required>
                @if($errors->has('datai_1'))
                    <span class="text-danger">{{ $errors->first('datai_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.datai_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dataf_1">{{ trans('cruds.ano.fields.dataf_1') }}</label>
                <input class="form-control date {{ $errors->has('dataf_1') ? 'is-invalid' : '' }}" type="text" name="dataf_1" id="dataf_1" value="{{ old('dataf_1', $ano->dataf_1) }}" required>
                @if($errors->has('dataf_1'))
                    <span class="text-danger">{{ $errors->first('dataf_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.dataf_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="datai_2">{{ trans('cruds.ano.fields.datai_2') }}</label>
                <input class="form-control date {{ $errors->has('datai_2') ? 'is-invalid' : '' }}" type="text" name="datai_2" id="datai_2" value="{{ old('datai_2', $ano->datai_2) }}" required>
                @if($errors->has('datai_2'))
                    <span class="text-danger">{{ $errors->first('datai_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.datai_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dataf_2">{{ trans('cruds.ano.fields.dataf_2') }}</label>
                <input class="form-control date {{ $errors->has('dataf_2') ? 'is-invalid' : '' }}" type="text" name="dataf_2" id="dataf_2" value="{{ old('dataf_2', $ano->dataf_2) }}" required>
                @if($errors->has('dataf_2'))
                    <span class="text-danger">{{ $errors->first('dataf_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.dataf_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="datai_3">{{ trans('cruds.ano.fields.datai_3') }}</label>
                <input class="form-control date {{ $errors->has('datai_3') ? 'is-invalid' : '' }}" type="text" name="datai_3" id="datai_3" value="{{ old('datai_3', $ano->datai_3) }}" required>
                @if($errors->has('datai_3'))
                    <span class="text-danger">{{ $errors->first('datai_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.datai_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dataf_3">{{ trans('cruds.ano.fields.dataf_3') }}</label>
                <input class="form-control date {{ $errors->has('dataf_3') ? 'is-invalid' : '' }}" type="text" name="dataf_3" id="dataf_3" value="{{ old('dataf_3', $ano->dataf_3) }}" required>
                @if($errors->has('dataf_3'))
                    <span class="text-danger">{{ $errors->first('dataf_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.dataf_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="datai_4">{{ trans('cruds.ano.fields.datai_4') }}</label>
                <input class="form-control date {{ $errors->has('datai_4') ? 'is-invalid' : '' }}" type="text" name="datai_4" id="datai_4" value="{{ old('datai_4', $ano->datai_4) }}" required>
                @if($errors->has('datai_4'))
                    <span class="text-danger">{{ $errors->first('datai_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.datai_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dataf_4">{{ trans('cruds.ano.fields.dataf_4') }}</label>
                <input class="form-control date {{ $errors->has('dataf_4') ? 'is-invalid' : '' }}" type="text" name="dataf_4" id="dataf_4" value="{{ old('dataf_4', $ano->dataf_4) }}" required>
                @if($errors->has('dataf_4'))
                    <span class="text-danger">{{ $errors->first('dataf_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.dataf_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="diapgto">{{ trans('cruds.ano.fields.diapgto') }}</label>
                <input class="form-control {{ $errors->has('diapgto') ? 'is-invalid' : '' }}" type="number" name="diapgto" id="diapgto" value="{{ old('diapgto', $ano->diapgto) }}" step="1" required>
                @if($errors->has('diapgto'))
                    <span class="text-danger">{{ $errors->first('diapgto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.diapgto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mora_1">{{ trans('cruds.ano.fields.mora_1') }}</label>
                <input class="form-control {{ $errors->has('mora_1') ? 'is-invalid' : '' }}" type="text" name="mora_1" id="mora_1" value="{{ old('mora_1', $ano->mora_1) }}">
                @if($errors->has('mora_1'))
                    <span class="text-danger">{{ $errors->first('mora_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.mora_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="multa_1">{{ trans('cruds.ano.fields.multa_1') }}</label>
                <input class="form-control {{ $errors->has('multa_1') ? 'is-invalid' : '' }}" type="text" name="multa_1" id="multa_1" value="{{ old('multa_1', $ano->multa_1) }}">
                @if($errors->has('multa_1'))
                    <span class="text-danger">{{ $errors->first('multa_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.multa_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instrucao_1">{{ trans('cruds.ano.fields.instrucao_1') }}</label>
                <input class="form-control {{ $errors->has('instrucao_1') ? 'is-invalid' : '' }}" type="text" name="instrucao_1" id="instrucao_1" value="{{ old('instrucao_1', $ano->instrucao_1) }}">
                @if($errors->has('instrucao_1'))
                    <span class="text-danger">{{ $errors->first('instrucao_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.instrucao_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mora_2">{{ trans('cruds.ano.fields.mora_2') }}</label>
                <input class="form-control {{ $errors->has('mora_2') ? 'is-invalid' : '' }}" type="text" name="mora_2" id="mora_2" value="{{ old('mora_2', $ano->mora_2) }}">
                @if($errors->has('mora_2'))
                    <span class="text-danger">{{ $errors->first('mora_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.mora_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="multa_2">{{ trans('cruds.ano.fields.multa_2') }}</label>
                <input class="form-control {{ $errors->has('multa_2') ? 'is-invalid' : '' }}" type="text" name="multa_2" id="multa_2" value="{{ old('multa_2', $ano->multa_2) }}">
                @if($errors->has('multa_2'))
                    <span class="text-danger">{{ $errors->first('multa_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.multa_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instrucao_2">{{ trans('cruds.ano.fields.instrucao_2') }}</label>
                <input class="form-control {{ $errors->has('instrucao_2') ? 'is-invalid' : '' }}" type="text" name="instrucao_2" id="instrucao_2" value="{{ old('instrucao_2', $ano->instrucao_2) }}">
                @if($errors->has('instrucao_2'))
                    <span class="text-danger">{{ $errors->first('instrucao_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.instrucao_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mora_3">{{ trans('cruds.ano.fields.mora_3') }}</label>
                <input class="form-control {{ $errors->has('mora_3') ? 'is-invalid' : '' }}" type="text" name="mora_3" id="mora_3" value="{{ old('mora_3', $ano->mora_3) }}">
                @if($errors->has('mora_3'))
                    <span class="text-danger">{{ $errors->first('mora_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.mora_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="multa_3">{{ trans('cruds.ano.fields.multa_3') }}</label>
                <input class="form-control {{ $errors->has('multa_3') ? 'is-invalid' : '' }}" type="text" name="multa_3" id="multa_3" value="{{ old('multa_3', $ano->multa_3) }}">
                @if($errors->has('multa_3'))
                    <span class="text-danger">{{ $errors->first('multa_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.multa_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instrucao_3">{{ trans('cruds.ano.fields.instrucao_3') }}</label>
                <input class="form-control {{ $errors->has('instrucao_3') ? 'is-invalid' : '' }}" type="text" name="instrucao_3" id="instrucao_3" value="{{ old('instrucao_3', $ano->instrucao_3) }}">
                @if($errors->has('instrucao_3'))
                    <span class="text-danger">{{ $errors->first('instrucao_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.instrucao_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mora_4">{{ trans('cruds.ano.fields.mora_4') }}</label>
                <input class="form-control {{ $errors->has('mora_4') ? 'is-invalid' : '' }}" type="text" name="mora_4" id="mora_4" value="{{ old('mora_4', $ano->mora_4) }}">
                @if($errors->has('mora_4'))
                    <span class="text-danger">{{ $errors->first('mora_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.mora_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="multa_4">{{ trans('cruds.ano.fields.multa_4') }}</label>
                <input class="form-control {{ $errors->has('multa_4') ? 'is-invalid' : '' }}" type="text" name="multa_4" id="multa_4" value="{{ old('multa_4', $ano->multa_4) }}">
                @if($errors->has('multa_4'))
                    <span class="text-danger">{{ $errors->first('multa_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.multa_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instrucao_4">{{ trans('cruds.ano.fields.instrucao_4') }}</label>
                <input class="form-control {{ $errors->has('instrucao_4') ? 'is-invalid' : '' }}" type="text" name="instrucao_4" id="instrucao_4" value="{{ old('instrucao_4', $ano->instrucao_4) }}">
                @if($errors->has('instrucao_4'))
                    <span class="text-danger">{{ $errors->first('instrucao_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.instrucao_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dia_vencimento">{{ trans('cruds.ano.fields.dia_vencimento') }}</label>
                <input class="form-control {{ $errors->has('dia_vencimento') ? 'is-invalid' : '' }}" type="number" name="dia_vencimento" id="dia_vencimento" value="{{ old('dia_vencimento', $ano->dia_vencimento) }}" step="1" required>
                @if($errors->has('dia_vencimento'))
                    <span class="text-danger">{{ $errors->first('dia_vencimento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ano.fields.dia_vencimento_helper') }}</span>
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