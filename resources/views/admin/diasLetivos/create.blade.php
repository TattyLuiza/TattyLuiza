@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.diasLetivo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dias-letivos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="data">{{ trans('cruds.diasLetivo.fields.data') }}</label>
                <input class="form-control date {{ $errors->has('data') ? 'is-invalid' : '' }}" type="text" name="data" id="data" value="{{ old('data') }}" required>
                @if($errors->has('data'))
                    <span class="text-danger">{{ $errors->first('data') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diasLetivo.fields.data_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ano_id">{{ trans('cruds.diasLetivo.fields.ano') }}</label>
                <select class="form-control select2 {{ $errors->has('ano') ? 'is-invalid' : '' }}" name="ano_id" id="ano_id" required>
                    @foreach($anos as $id => $entry)
                        <option value="{{ $id }}" {{ old('ano_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ano'))
                    <span class="text-danger">{{ $errors->first('ano') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diasLetivo.fields.ano_helper') }}</span>
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