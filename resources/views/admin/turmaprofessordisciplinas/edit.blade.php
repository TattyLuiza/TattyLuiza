@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.turmaprofessordisciplina.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.turmaprofessordisciplinas.update", [$turmaprofessordisciplina->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="turma_id">{{ trans('cruds.turmaprofessordisciplina.fields.turma') }}</label>
                <select class="form-control select2 {{ $errors->has('turma') ? 'is-invalid' : '' }}" name="turma_id" id="turma_id" required>
                    @foreach($turmas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('turma_id') ? old('turma_id') : $turmaprofessordisciplina->turma->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('turma'))
                    <span class="text-danger">{{ $errors->first('turma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turmaprofessordisciplina.fields.turma_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="professor_id">{{ trans('cruds.turmaprofessordisciplina.fields.professor') }}</label>
                <select class="form-control select2 {{ $errors->has('professor') ? 'is-invalid' : '' }}" name="professor_id" id="professor_id" required>
                    @foreach($professors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('professor_id') ? old('professor_id') : $turmaprofessordisciplina->professor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('professor'))
                    <span class="text-danger">{{ $errors->first('professor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turmaprofessordisciplina.fields.professor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="disciplina_id">{{ trans('cruds.turmaprofessordisciplina.fields.disciplina') }}</label>
                <select class="form-control select2 {{ $errors->has('disciplina') ? 'is-invalid' : '' }}" name="disciplina_id" id="disciplina_id" required>
                    @foreach($disciplinas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('disciplina_id') ? old('disciplina_id') : $turmaprofessordisciplina->disciplina->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('disciplina'))
                    <span class="text-danger">{{ $errors->first('disciplina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turmaprofessordisciplina.fields.disciplina_helper') }}</span>
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