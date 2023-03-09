@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.email.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.emails.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nome">{{ trans('cruds.email.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', '') }}">
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.email.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="texto">{{ trans('cruds.email.fields.texto') }}</label>
                <textarea class="form-control {{ $errors->has('texto') ? 'is-invalid' : '' }}" name="texto" id="texto">{{ old('texto') }}</textarea>
                @if($errors->has('texto'))
                    <span class="text-danger">{{ $errors->first('texto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.email.fields.texto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inicio">{{ trans('cruds.email.fields.inicio') }}</label>
                <input class="form-control date {{ $errors->has('inicio') ? 'is-invalid' : '' }}" type="text" name="inicio" id="inicio" value="{{ old('inicio') }}">
                @if($errors->has('inicio'))
                    <span class="text-danger">{{ $errors->first('inicio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.email.fields.inicio_helper') }}</span>
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