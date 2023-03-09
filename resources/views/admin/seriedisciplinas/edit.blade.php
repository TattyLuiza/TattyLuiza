@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.seriedisciplina.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.seriedisciplinas.update", [$seriedisciplina->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="serie_id">{{ trans('cruds.seriedisciplina.fields.serie') }}</label>
                <select class="form-control select2 {{ $errors->has('serie') ? 'is-invalid' : '' }}" name="serie_id" id="serie_id" required>
                    @foreach($series as $id => $entry)
                        <option value="{{ $id }}" {{ (old('serie_id') ? old('serie_id') : $seriedisciplina->serie->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('serie'))
                    <span class="text-danger">{{ $errors->first('serie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.seriedisciplina.fields.serie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disciplina_id">{{ trans('cruds.seriedisciplina.fields.disciplina') }}</label>
                <select class="form-control select2 {{ $errors->has('disciplina') ? 'is-invalid' : '' }}" name="disciplina_id" id="disciplina_id">
                    @foreach($disciplinas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('disciplina_id') ? old('disciplina_id') : $seriedisciplina->disciplina->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('disciplina'))
                    <span class="text-danger">{{ $errors->first('disciplina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.seriedisciplina.fields.disciplina_helper') }}</span>
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