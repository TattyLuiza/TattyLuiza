@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.series.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.seriess.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tipo">{{ trans('cruds.series.fields.tipo') }}</label>
                <input class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" type="text" name="tipo" id="tipo" value="{{ old('tipo', '') }}">
                @if($errors->has('tipo'))
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.series.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.series.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', '') }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.series.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="turno">{{ trans('cruds.series.fields.turno') }}</label>
                <input class="form-control {{ $errors->has('turno') ? 'is-invalid' : '' }}" type="text" name="turno" id="turno" value="{{ old('turno', '') }}">
                @if($errors->has('turno'))
                    <span class="text-danger">{{ $errors->first('turno') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.series.fields.turno_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valor">{{ trans('cruds.series.fields.valor') }}</label>
                <input class="form-control {{ $errors->has('valor') ? 'is-invalid' : '' }}" type="number" name="valor" id="valor" value="{{ old('valor', '') }}" step="0.01">
                @if($errors->has('valor'))
                    <span class="text-danger">{{ $errors->first('valor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.series.fields.valor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sala">{{ trans('cruds.series.fields.sala') }}</label>
                <input class="form-control {{ $errors->has('sala') ? 'is-invalid' : '' }}" type="text" name="sala" id="sala" value="{{ old('sala', '') }}">
                @if($errors->has('sala'))
                    <span class="text-danger">{{ $errors->first('sala') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.series.fields.sala_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obs">{{ trans('cruds.series.fields.obs') }}</label>
                <textarea class="form-control {{ $errors->has('obs') ? 'is-invalid' : '' }}" name="obs" id="obs">{{ old('obs') }}</textarea>
                @if($errors->has('obs'))
                    <span class="text-danger">{{ $errors->first('obs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.series.fields.obs_helper') }}</span>
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