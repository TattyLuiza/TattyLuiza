@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.horario.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.horarios.update", [$horario->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="ano_id">{{ trans('cruds.horario.fields.ano') }}</label>
                <select class="form-control select2 {{ $errors->has('ano') ? 'is-invalid' : '' }}" name="ano_id" id="ano_id">
                    @foreach($anos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ano_id') ? old('ano_id') : $horario->ano->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ano'))
                    <span class="text-danger">{{ $errors->first('ano') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horario.fields.ano_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.horario.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $horario->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horario.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ini">{{ trans('cruds.horario.fields.ini') }}</label>
                <input class="form-control timepicker {{ $errors->has('ini') ? 'is-invalid' : '' }}" type="text" name="ini" id="ini" value="{{ old('ini', $horario->ini) }}" required>
                @if($errors->has('ini'))
                    <span class="text-danger">{{ $errors->first('ini') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horario.fields.ini_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fim">{{ trans('cruds.horario.fields.fim') }}</label>
                <input class="form-control timepicker {{ $errors->has('fim') ? 'is-invalid' : '' }}" type="text" name="fim" id="fim" value="{{ old('fim', $horario->fim) }}" required>
                @if($errors->has('fim'))
                    <span class="text-danger">{{ $errors->first('fim') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horario.fields.fim_helper') }}</span>
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