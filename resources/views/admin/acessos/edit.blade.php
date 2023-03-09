@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.acesso.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.acessos.update", [$acesso->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="usuario">{{ trans('cruds.acesso.fields.usuario') }}</label>
                <input class="form-control {{ $errors->has('usuario') ? 'is-invalid' : '' }}" type="text" name="usuario" id="usuario" value="{{ old('usuario', $acesso->usuario) }}">
                @if($errors->has('usuario'))
                    <span class="text-danger">{{ $errors->first('usuario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acesso.fields.usuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.acesso.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', $acesso->url) }}">
                @if($errors->has('url'))
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acesso.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ip">{{ trans('cruds.acesso.fields.ip') }}</label>
                <input class="form-control {{ $errors->has('ip') ? 'is-invalid' : '' }}" type="text" name="ip" id="ip" value="{{ old('ip', $acesso->ip) }}">
                @if($errors->has('ip'))
                    <span class="text-danger">{{ $errors->first('ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acesso.fields.ip_helper') }}</span>
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