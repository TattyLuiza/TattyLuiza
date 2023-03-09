@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.boleto.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.boletos.update", [$boleto->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="banco_id">{{ trans('cruds.boleto.fields.banco') }}</label>
                <select class="form-control select2 {{ $errors->has('banco') ? 'is-invalid' : '' }}" name="banco_id" id="banco_id" required>
                    @foreach($bancos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('banco_id') ? old('banco_id') : $boleto->banco->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('banco'))
                    <span class="text-danger">{{ $errors->first('banco') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.banco_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="matricula_id">{{ trans('cruds.boleto.fields.matricula') }}</label>
                <select class="form-control select2 {{ $errors->has('matricula') ? 'is-invalid' : '' }}" name="matricula_id" id="matricula_id">
                    @foreach($matriculas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('matricula_id') ? old('matricula_id') : $boleto->matricula->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('matricula'))
                    <span class="text-danger">{{ $errors->first('matricula') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.matricula_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="turma_id">{{ trans('cruds.boleto.fields.turma') }}</label>
                <select class="form-control select2 {{ $errors->has('turma') ? 'is-invalid' : '' }}" name="turma_id" id="turma_id">
                    @foreach($turmas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('turma_id') ? old('turma_id') : $boleto->turma->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('turma'))
                    <span class="text-danger">{{ $errors->first('turma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.turma_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="movimento">{{ trans('cruds.boleto.fields.movimento') }}</label>
                <input class="form-control {{ $errors->has('movimento') ? 'is-invalid' : '' }}" type="text" name="movimento" id="movimento" value="{{ old('movimento', $boleto->movimento) }}">
                @if($errors->has('movimento'))
                    <span class="text-danger">{{ $errors->first('movimento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.movimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descricao">{{ trans('cruds.boleto.fields.descricao') }}</label>
                <input class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}" type="text" name="descricao" id="descricao" value="{{ old('descricao', $boleto->descricao) }}">
                @if($errors->has('descricao'))
                    <span class="text-danger">{{ $errors->first('descricao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.descricao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parcela">{{ trans('cruds.boleto.fields.parcela') }}</label>
                <input class="form-control {{ $errors->has('parcela') ? 'is-invalid' : '' }}" type="text" name="parcela" id="parcela" value="{{ old('parcela', $boleto->parcela) }}">
                @if($errors->has('parcela'))
                    <span class="text-danger">{{ $errors->first('parcela') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.parcela_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valor">{{ trans('cruds.boleto.fields.valor') }}</label>
                <input class="form-control {{ $errors->has('valor') ? 'is-invalid' : '' }}" type="number" name="valor" id="valor" value="{{ old('valor', $boleto->valor) }}" step="0.01" required>
                @if($errors->has('valor'))
                    <span class="text-danger">{{ $errors->first('valor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.valor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="recebido">{{ trans('cruds.boleto.fields.recebido') }}</label>
                <input class="form-control {{ $errors->has('recebido') ? 'is-invalid' : '' }}" type="number" name="recebido" id="recebido" value="{{ old('recebido', $boleto->recebido) }}" step="0.01" required>
                @if($errors->has('recebido'))
                    <span class="text-danger">{{ $errors->first('recebido') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.recebido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="datadesconto">{{ trans('cruds.boleto.fields.datadesconto') }}</label>
                <input class="form-control date {{ $errors->has('datadesconto') ? 'is-invalid' : '' }}" type="text" name="datadesconto" id="datadesconto" value="{{ old('datadesconto', $boleto->datadesconto) }}">
                @if($errors->has('datadesconto'))
                    <span class="text-danger">{{ $errors->first('datadesconto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.datadesconto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valordesconto">{{ trans('cruds.boleto.fields.valordesconto') }}</label>
                <input class="form-control {{ $errors->has('valordesconto') ? 'is-invalid' : '' }}" type="number" name="valordesconto" id="valordesconto" value="{{ old('valordesconto', $boleto->valordesconto) }}" step="0.01" required>
                @if($errors->has('valordesconto'))
                    <span class="text-danger">{{ $errors->first('valordesconto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.valordesconto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instrucoes">{{ trans('cruds.boleto.fields.instrucoes') }}</label>
                <input class="form-control {{ $errors->has('instrucoes') ? 'is-invalid' : '' }}" type="text" name="instrucoes" id="instrucoes" value="{{ old('instrucoes', $boleto->instrucoes) }}">
                @if($errors->has('instrucoes'))
                    <span class="text-danger">{{ $errors->first('instrucoes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.instrucoes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.boleto.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $boleto->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipo">{{ trans('cruds.boleto.fields.tipo') }}</label>
                <input class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" type="number" name="tipo" id="tipo" value="{{ old('tipo', $boleto->tipo) }}" step="1">
                @if($errors->has('tipo'))
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mora">{{ trans('cruds.boleto.fields.mora') }}</label>
                <input class="form-control {{ $errors->has('mora') ? 'is-invalid' : '' }}" type="text" name="mora" id="mora" value="{{ old('mora', $boleto->mora) }}">
                @if($errors->has('mora'))
                    <span class="text-danger">{{ $errors->first('mora') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.mora_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="multa">{{ trans('cruds.boleto.fields.multa') }}</label>
                <input class="form-control {{ $errors->has('multa') ? 'is-invalid' : '' }}" type="text" name="multa" id="multa" value="{{ old('multa', $boleto->multa) }}">
                @if($errors->has('multa'))
                    <span class="text-danger">{{ $errors->first('multa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.multa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vencimento">{{ trans('cruds.boleto.fields.vencimento') }}</label>
                <input class="form-control date {{ $errors->has('vencimento') ? 'is-invalid' : '' }}" type="text" name="vencimento" id="vencimento" value="{{ old('vencimento', $boleto->vencimento) }}" required>
                @if($errors->has('vencimento'))
                    <span class="text-danger">{{ $errors->first('vencimento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.vencimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="data">{{ trans('cruds.boleto.fields.data') }}</label>
                <input class="form-control date {{ $errors->has('data') ? 'is-invalid' : '' }}" type="text" name="data" id="data" value="{{ old('data', $boleto->data) }}" required>
                @if($errors->has('data'))
                    <span class="text-danger">{{ $errors->first('data') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boleto.fields.data_helper') }}</span>
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