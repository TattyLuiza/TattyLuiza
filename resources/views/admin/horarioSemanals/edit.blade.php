@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.horarioSemanal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.horario-semanals.update", [$horarioSemanal->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="ano_id">{{ trans('cruds.horarioSemanal.fields.ano') }}</label>
                <select class="form-control select2 {{ $errors->has('ano') ? 'is-invalid' : '' }}" name="ano_id" id="ano_id" required>
                    @foreach($anos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ano_id') ? old('ano_id') : $horarioSemanal->ano->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ano'))
                    <span class="text-danger">{{ $errors->first('ano') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horarioSemanal.fields.ano_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="turma_id">{{ trans('cruds.horarioSemanal.fields.turma') }}</label>
                <select class="form-control select2 {{ $errors->has('turma') ? 'is-invalid' : '' }}" name="turma_id" id="turma_id" required>
                    @foreach($turmas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('turma_id') ? old('turma_id') : $horarioSemanal->turma->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('turma'))
                    <span class="text-danger">{{ $errors->first('turma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horarioSemanal.fields.turma_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="professor_id">{{ trans('cruds.horarioSemanal.fields.professor') }}</label>
                <select class="form-control select2 {{ $errors->has('professor') ? 'is-invalid' : '' }}" name="professor_id" id="professor_id" required>
                    @foreach($professors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('professor_id') ? old('professor_id') : $horarioSemanal->professor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('professor'))
                    <span class="text-danger">{{ $errors->first('professor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horarioSemanal.fields.professor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="horario_id">{{ trans('cruds.horarioSemanal.fields.horario') }}</label>
                <select class="form-control select2 {{ $errors->has('horario') ? 'is-invalid' : '' }}" name="horario_id" id="horario_id" required>
                    @foreach($horarios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('horario_id') ? old('horario_id') : $horarioSemanal->horario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('horario'))
                    <span class="text-danger">{{ $errors->first('horario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horarioSemanal.fields.horario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="disciplina_id">{{ trans('cruds.horarioSemanal.fields.disciplina') }}</label>
                <select class="form-control select2 {{ $errors->has('disciplina') ? 'is-invalid' : '' }}" name="disciplina_id" id="disciplina_id" required>
                    @foreach($disciplinas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('disciplina_id') ? old('disciplina_id') : $horarioSemanal->disciplina->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('disciplina'))
                    <span class="text-danger">{{ $errors->first('disciplina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horarioSemanal.fields.disciplina_helper') }}</span>
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