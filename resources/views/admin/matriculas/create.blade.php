@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.matricula.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.matriculas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="ano_id">{{ trans('cruds.matricula.fields.ano') }}</label>
                <select class="form-control select2 {{ $errors->has('ano') ? 'is-invalid' : '' }}" name="ano_id" id="ano_id" required>
                    @foreach($anos as $id => $entry)
                        <option value="{{ $id }}" {{ old('ano_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ano'))
                    <span class="text-danger">{{ $errors->first('ano') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.ano_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.matricula.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', '') }}" step="1" required>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="aluno_id">{{ trans('cruds.matricula.fields.aluno') }}</label>
                <select class="form-control select2 {{ $errors->has('aluno') ? 'is-invalid' : '' }}" name="aluno_id" id="aluno_id" required>
                    @foreach($alunos as $id => $entry)
                        <option value="{{ $id }}" {{ old('aluno_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('aluno'))
                    <span class="text-danger">{{ $errors->first('aluno') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.aluno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="aluno_nome">{{ trans('cruds.matricula.fields.aluno_nome') }}</label>
                <input class="form-control {{ $errors->has('aluno_nome') ? 'is-invalid' : '' }}" type="text" name="aluno_nome" id="aluno_nome" value="{{ old('aluno_nome', '') }}" required>
                @if($errors->has('aluno_nome'))
                    <span class="text-danger">{{ $errors->first('aluno_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.aluno_nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mae_id">{{ trans('cruds.matricula.fields.mae') }}</label>
                <select class="form-control select2 {{ $errors->has('mae') ? 'is-invalid' : '' }}" name="mae_id" id="mae_id" required>
                    @foreach($maes as $id => $entry)
                        <option value="{{ $id }}" {{ old('mae_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('mae'))
                    <span class="text-danger">{{ $errors->first('mae') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.mae_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mae_nome">{{ trans('cruds.matricula.fields.mae_nome') }}</label>
                <input class="form-control {{ $errors->has('mae_nome') ? 'is-invalid' : '' }}" type="text" name="mae_nome" id="mae_nome" value="{{ old('mae_nome', '') }}">
                @if($errors->has('mae_nome'))
                    <span class="text-danger">{{ $errors->first('mae_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.mae_nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pai_id">{{ trans('cruds.matricula.fields.pai') }}</label>
                <select class="form-control select2 {{ $errors->has('pai') ? 'is-invalid' : '' }}" name="pai_id" id="pai_id" required>
                    @foreach($pais as $id => $entry)
                        <option value="{{ $id }}" {{ old('pai_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pai'))
                    <span class="text-danger">{{ $errors->first('pai') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.pai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pai_nome">{{ trans('cruds.matricula.fields.pai_nome') }}</label>
                <input class="form-control {{ $errors->has('pai_nome') ? 'is-invalid' : '' }}" type="text" name="pai_nome" id="pai_nome" value="{{ old('pai_nome', '') }}">
                @if($errors->has('pai_nome'))
                    <span class="text-danger">{{ $errors->first('pai_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.pai_nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="turno">{{ trans('cruds.matricula.fields.turno') }}</label>
                <input class="form-control {{ $errors->has('turno') ? 'is-invalid' : '' }}" type="text" name="turno" id="turno" value="{{ old('turno', '') }}">
                @if($errors->has('turno'))
                    <span class="text-danger">{{ $errors->first('turno') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.turno_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="turma_id">{{ trans('cruds.matricula.fields.turma') }}</label>
                <select class="form-control select2 {{ $errors->has('turma') ? 'is-invalid' : '' }}" name="turma_id" id="turma_id">
                    @foreach($turmas as $id => $entry)
                        <option value="{{ $id }}" {{ old('turma_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('turma'))
                    <span class="text-danger">{{ $errors->first('turma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.turma_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="turma_nome">{{ trans('cruds.matricula.fields.turma_nome') }}</label>
                <input class="form-control {{ $errors->has('turma_nome') ? 'is-invalid' : '' }}" type="text" name="turma_nome" id="turma_nome" value="{{ old('turma_nome', '') }}">
                @if($errors->has('turma_nome'))
                    <span class="text-danger">{{ $errors->first('turma_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.turma_nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valor">{{ trans('cruds.matricula.fields.valor') }}</label>
                <input class="form-control {{ $errors->has('valor') ? 'is-invalid' : '' }}" type="number" name="valor" id="valor" value="{{ old('valor', '') }}" step="0.01" required>
                @if($errors->has('valor'))
                    <span class="text-danger">{{ $errors->first('valor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.valor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desconto">{{ trans('cruds.matricula.fields.desconto') }}</label>
                <input class="form-control {{ $errors->has('desconto') ? 'is-invalid' : '' }}" type="number" name="desconto" id="desconto" value="{{ old('desconto', '') }}" step="0.01">
                @if($errors->has('desconto'))
                    <span class="text-danger">{{ $errors->first('desconto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.desconto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.matricula.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="0.01" required>
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conceito_1">{{ trans('cruds.matricula.fields.conceito_1') }}</label>
                <textarea class="form-control {{ $errors->has('conceito_1') ? 'is-invalid' : '' }}" name="conceito_1" id="conceito_1">{{ old('conceito_1') }}</textarea>
                @if($errors->has('conceito_1'))
                    <span class="text-danger">{{ $errors->first('conceito_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.conceito_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conceito_2">{{ trans('cruds.matricula.fields.conceito_2') }}</label>
                <textarea class="form-control {{ $errors->has('conceito_2') ? 'is-invalid' : '' }}" name="conceito_2" id="conceito_2">{{ old('conceito_2') }}</textarea>
                @if($errors->has('conceito_2'))
                    <span class="text-danger">{{ $errors->first('conceito_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.conceito_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conceito_3">{{ trans('cruds.matricula.fields.conceito_3') }}</label>
                <textarea class="form-control {{ $errors->has('conceito_3') ? 'is-invalid' : '' }}" name="conceito_3" id="conceito_3">{{ old('conceito_3') }}</textarea>
                @if($errors->has('conceito_3'))
                    <span class="text-danger">{{ $errors->first('conceito_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.conceito_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conceito_4">{{ trans('cruds.matricula.fields.conceito_4') }}</label>
                <textarea class="form-control {{ $errors->has('conceito_4') ? 'is-invalid' : '' }}" name="conceito_4" id="conceito_4">{{ old('conceito_4') }}</textarea>
                @if($errors->has('conceito_4'))
                    <span class="text-danger">{{ $errors->first('conceito_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.conceito_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conceitofinal">{{ trans('cruds.matricula.fields.conceitofinal') }}</label>
                <textarea class="form-control {{ $errors->has('conceitofinal') ? 'is-invalid' : '' }}" name="conceitofinal" id="conceitofinal">{{ old('conceitofinal') }}</textarea>
                @if($errors->has('conceitofinal'))
                    <span class="text-danger">{{ $errors->first('conceitofinal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.conceitofinal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obs">{{ trans('cruds.matricula.fields.obs') }}</label>
                <textarea class="form-control {{ $errors->has('obs') ? 'is-invalid' : '' }}" name="obs" id="obs">{{ old('obs') }}</textarea>
                @if($errors->has('obs'))
                    <span class="text-danger">{{ $errors->first('obs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.obs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="falta_1">{{ trans('cruds.matricula.fields.falta_1') }}</label>
                <input class="form-control {{ $errors->has('falta_1') ? 'is-invalid' : '' }}" type="number" name="falta_1" id="falta_1" value="{{ old('falta_1', '') }}" step="1">
                @if($errors->has('falta_1'))
                    <span class="text-danger">{{ $errors->first('falta_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.falta_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="falta_2">{{ trans('cruds.matricula.fields.falta_2') }}</label>
                <input class="form-control {{ $errors->has('falta_2') ? 'is-invalid' : '' }}" type="number" name="falta_2" id="falta_2" value="{{ old('falta_2', '') }}" step="1">
                @if($errors->has('falta_2'))
                    <span class="text-danger">{{ $errors->first('falta_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.falta_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="falta_3">{{ trans('cruds.matricula.fields.falta_3') }}</label>
                <input class="form-control {{ $errors->has('falta_3') ? 'is-invalid' : '' }}" type="number" name="falta_3" id="falta_3" value="{{ old('falta_3', '') }}" step="1">
                @if($errors->has('falta_3'))
                    <span class="text-danger">{{ $errors->first('falta_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.falta_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="falta_4">{{ trans('cruds.matricula.fields.falta_4') }}</label>
                <input class="form-control {{ $errors->has('falta_4') ? 'is-invalid' : '' }}" type="number" name="falta_4" id="falta_4" value="{{ old('falta_4', '') }}" step="1">
                @if($errors->has('falta_4'))
                    <span class="text-danger">{{ $errors->first('falta_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.falta_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="faltaf">{{ trans('cruds.matricula.fields.faltaf') }}</label>
                <input class="form-control {{ $errors->has('faltaf') ? 'is-invalid' : '' }}" type="number" name="faltaf" id="faltaf" value="{{ old('faltaf', '') }}" step="1">
                @if($errors->has('faltaf'))
                    <span class="text-danger">{{ $errors->first('faltaf') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.faltaf_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_transferencia">{{ trans('cruds.matricula.fields.data_transferencia') }}</label>
                <input class="form-control date {{ $errors->has('data_transferencia') ? 'is-invalid' : '' }}" type="text" name="data_transferencia" id="data_transferencia" value="{{ old('data_transferencia') }}">
                @if($errors->has('data_transferencia'))
                    <span class="text-danger">{{ $errors->first('data_transferencia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.data_transferencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obs_transferencia">{{ trans('cruds.matricula.fields.obs_transferencia') }}</label>
                <textarea class="form-control {{ $errors->has('obs_transferencia') ? 'is-invalid' : '' }}" name="obs_transferencia" id="obs_transferencia">{{ old('obs_transferencia') }}</textarea>
                @if($errors->has('obs_transferencia'))
                    <span class="text-danger">{{ $errors->first('obs_transferencia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricula.fields.obs_transferencia_helper') }}</span>
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