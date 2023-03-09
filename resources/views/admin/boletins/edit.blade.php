@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.boletin.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.boletins.update", [$boletin->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="aluno_id">{{ trans('cruds.boletin.fields.aluno') }}</label>
                <select class="form-control select2 {{ $errors->has('aluno') ? 'is-invalid' : '' }}" name="aluno_id" id="aluno_id" required>
                    @foreach($alunos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('aluno_id') ? old('aluno_id') : $boletin->aluno->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('aluno'))
                    <span class="text-danger">{{ $errors->first('aluno') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.aluno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="matricula_id">{{ trans('cruds.boletin.fields.matricula') }}</label>
                <select class="form-control select2 {{ $errors->has('matricula') ? 'is-invalid' : '' }}" name="matricula_id" id="matricula_id" required>
                    @foreach($matriculas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('matricula_id') ? old('matricula_id') : $boletin->matricula->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('matricula'))
                    <span class="text-danger">{{ $errors->first('matricula') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.matricula_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="professor_id">{{ trans('cruds.boletin.fields.professor') }}</label>
                <select class="form-control select2 {{ $errors->has('professor') ? 'is-invalid' : '' }}" name="professor_id" id="professor_id" required>
                    @foreach($professors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('professor_id') ? old('professor_id') : $boletin->professor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('professor'))
                    <span class="text-danger">{{ $errors->first('professor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.professor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="turma_id">{{ trans('cruds.boletin.fields.turma') }}</label>
                <select class="form-control select2 {{ $errors->has('turma') ? 'is-invalid' : '' }}" name="turma_id" id="turma_id" required>
                    @foreach($turmas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('turma_id') ? old('turma_id') : $boletin->turma->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('turma'))
                    <span class="text-danger">{{ $errors->first('turma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.turma_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="disciplina_id">{{ trans('cruds.boletin.fields.disciplina') }}</label>
                <select class="form-control select2 {{ $errors->has('disciplina') ? 'is-invalid' : '' }}" name="disciplina_id" id="disciplina_id" required>
                    @foreach($disciplinas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('disciplina_id') ? old('disciplina_id') : $boletin->disciplina->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('disciplina'))
                    <span class="text-danger">{{ $errors->first('disciplina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.disciplina_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="t_1">{{ trans('cruds.boletin.fields.t_1') }}</label>
                <input class="form-control {{ $errors->has('t_1') ? 'is-invalid' : '' }}" type="text" name="t_1" id="t_1" value="{{ old('t_1', $boletin->t_1) }}">
                @if($errors->has('t_1'))
                    <span class="text-danger">{{ $errors->first('t_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.t_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="n_1">{{ trans('cruds.boletin.fields.n_1') }}</label>
                <input class="form-control {{ $errors->has('n_1') ? 'is-invalid' : '' }}" type="text" name="n_1" id="n_1" value="{{ old('n_1', $boletin->n_1) }}">
                @if($errors->has('n_1'))
                    <span class="text-danger">{{ $errors->first('n_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.n_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="f_1">{{ trans('cruds.boletin.fields.f_1') }}</label>
                <input class="form-control {{ $errors->has('f_1') ? 'is-invalid' : '' }}" type="text" name="f_1" id="f_1" value="{{ old('f_1', $boletin->f_1) }}">
                @if($errors->has('f_1'))
                    <span class="text-danger">{{ $errors->first('f_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.f_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="t_2">{{ trans('cruds.boletin.fields.t_2') }}</label>
                <input class="form-control {{ $errors->has('t_2') ? 'is-invalid' : '' }}" type="text" name="t_2" id="t_2" value="{{ old('t_2', $boletin->t_2) }}">
                @if($errors->has('t_2'))
                    <span class="text-danger">{{ $errors->first('t_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.t_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="n_2">{{ trans('cruds.boletin.fields.n_2') }}</label>
                <input class="form-control {{ $errors->has('n_2') ? 'is-invalid' : '' }}" type="text" name="n_2" id="n_2" value="{{ old('n_2', $boletin->n_2) }}">
                @if($errors->has('n_2'))
                    <span class="text-danger">{{ $errors->first('n_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.n_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="f_2">{{ trans('cruds.boletin.fields.f_2') }}</label>
                <input class="form-control {{ $errors->has('f_2') ? 'is-invalid' : '' }}" type="text" name="f_2" id="f_2" value="{{ old('f_2', $boletin->f_2) }}">
                @if($errors->has('f_2'))
                    <span class="text-danger">{{ $errors->first('f_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.f_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="t_3">{{ trans('cruds.boletin.fields.t_3') }}</label>
                <input class="form-control {{ $errors->has('t_3') ? 'is-invalid' : '' }}" type="text" name="t_3" id="t_3" value="{{ old('t_3', $boletin->t_3) }}">
                @if($errors->has('t_3'))
                    <span class="text-danger">{{ $errors->first('t_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.t_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="n_3">{{ trans('cruds.boletin.fields.n_3') }}</label>
                <input class="form-control {{ $errors->has('n_3') ? 'is-invalid' : '' }}" type="text" name="n_3" id="n_3" value="{{ old('n_3', $boletin->n_3) }}">
                @if($errors->has('n_3'))
                    <span class="text-danger">{{ $errors->first('n_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.n_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="f_3">{{ trans('cruds.boletin.fields.f_3') }}</label>
                <input class="form-control {{ $errors->has('f_3') ? 'is-invalid' : '' }}" type="text" name="f_3" id="f_3" value="{{ old('f_3', $boletin->f_3) }}">
                @if($errors->has('f_3'))
                    <span class="text-danger">{{ $errors->first('f_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.f_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="t_4">{{ trans('cruds.boletin.fields.t_4') }}</label>
                <input class="form-control {{ $errors->has('t_4') ? 'is-invalid' : '' }}" type="text" name="t_4" id="t_4" value="{{ old('t_4', $boletin->t_4) }}">
                @if($errors->has('t_4'))
                    <span class="text-danger">{{ $errors->first('t_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.t_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="n_4">{{ trans('cruds.boletin.fields.n_4') }}</label>
                <input class="form-control {{ $errors->has('n_4') ? 'is-invalid' : '' }}" type="text" name="n_4" id="n_4" value="{{ old('n_4', $boletin->n_4) }}">
                @if($errors->has('n_4'))
                    <span class="text-danger">{{ $errors->first('n_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.n_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="f_4">{{ trans('cruds.boletin.fields.f_4') }}</label>
                <input class="form-control {{ $errors->has('f_4') ? 'is-invalid' : '' }}" type="text" name="f_4" id="f_4" value="{{ old('f_4', $boletin->f_4) }}">
                @if($errors->has('f_4'))
                    <span class="text-danger">{{ $errors->first('f_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.f_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="r_1">{{ trans('cruds.boletin.fields.r_1') }}</label>
                <input class="form-control {{ $errors->has('r_1') ? 'is-invalid' : '' }}" type="text" name="r_1" id="r_1" value="{{ old('r_1', $boletin->r_1) }}">
                @if($errors->has('r_1'))
                    <span class="text-danger">{{ $errors->first('r_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.r_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="r_2">{{ trans('cruds.boletin.fields.r_2') }}</label>
                <input class="form-control {{ $errors->has('r_2') ? 'is-invalid' : '' }}" type="text" name="r_2" id="r_2" value="{{ old('r_2', $boletin->r_2) }}">
                @if($errors->has('r_2'))
                    <span class="text-danger">{{ $errors->first('r_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.r_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="r_3">{{ trans('cruds.boletin.fields.r_3') }}</label>
                <input class="form-control {{ $errors->has('r_3') ? 'is-invalid' : '' }}" type="text" name="r_3" id="r_3" value="{{ old('r_3', $boletin->r_3) }}">
                @if($errors->has('r_3'))
                    <span class="text-danger">{{ $errors->first('r_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.r_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="r_4">{{ trans('cruds.boletin.fields.r_4') }}</label>
                <input class="form-control {{ $errors->has('r_4') ? 'is-invalid' : '' }}" type="text" name="r_4" id="r_4" value="{{ old('r_4', $boletin->r_4) }}">
                @if($errors->has('r_4'))
                    <span class="text-danger">{{ $errors->first('r_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.r_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tr">{{ trans('cruds.boletin.fields.tr') }}</label>
                <input class="form-control {{ $errors->has('tr') ? 'is-invalid' : '' }}" type="text" name="tr" id="tr" value="{{ old('tr', $boletin->tr) }}">
                @if($errors->has('tr'))
                    <span class="text-danger">{{ $errors->first('tr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.tr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tr_nota">{{ trans('cruds.boletin.fields.tr_nota') }}</label>
                <input class="form-control {{ $errors->has('tr_nota') ? 'is-invalid' : '' }}" type="text" name="tr_nota" id="tr_nota" value="{{ old('tr_nota', $boletin->tr_nota) }}">
                @if($errors->has('tr_nota'))
                    <span class="text-danger">{{ $errors->first('tr_nota') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.tr_nota_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="t_falta">{{ trans('cruds.boletin.fields.t_falta') }}</label>
                <input class="form-control {{ $errors->has('t_falta') ? 'is-invalid' : '' }}" type="text" name="t_falta" id="t_falta" value="{{ old('t_falta', $boletin->t_falta) }}">
                @if($errors->has('t_falta'))
                    <span class="text-danger">{{ $errors->first('t_falta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.t_falta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recuperacao">{{ trans('cruds.boletin.fields.recuperacao') }}</label>
                <input class="form-control {{ $errors->has('recuperacao') ? 'is-invalid' : '' }}" type="text" name="recuperacao" id="recuperacao" value="{{ old('recuperacao', $boletin->recuperacao) }}">
                @if($errors->has('recuperacao'))
                    <span class="text-danger">{{ $errors->first('recuperacao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.recuperacao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="resultado">{{ trans('cruds.boletin.fields.resultado') }}</label>
                <input class="form-control {{ $errors->has('resultado') ? 'is-invalid' : '' }}" type="text" name="resultado" id="resultado" value="{{ old('resultado', $boletin->resultado) }}">
                @if($errors->has('resultado'))
                    <span class="text-danger">{{ $errors->first('resultado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.resultado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="aluno_nome">{{ trans('cruds.boletin.fields.aluno_nome') }}</label>
                <input class="form-control {{ $errors->has('aluno_nome') ? 'is-invalid' : '' }}" type="text" name="aluno_nome" id="aluno_nome" value="{{ old('aluno_nome', $boletin->aluno_nome) }}">
                @if($errors->has('aluno_nome'))
                    <span class="text-danger">{{ $errors->first('aluno_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.aluno_nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="turma_nome">{{ trans('cruds.boletin.fields.turma_nome') }}</label>
                <input class="form-control {{ $errors->has('turma_nome') ? 'is-invalid' : '' }}" type="text" name="turma_nome" id="turma_nome" value="{{ old('turma_nome', $boletin->turma_nome) }}">
                @if($errors->has('turma_nome'))
                    <span class="text-danger">{{ $errors->first('turma_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.turma_nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="materia_nome">{{ trans('cruds.boletin.fields.materia_nome') }}</label>
                <input class="form-control {{ $errors->has('materia_nome') ? 'is-invalid' : '' }}" type="text" name="materia_nome" id="materia_nome" value="{{ old('materia_nome', $boletin->materia_nome) }}">
                @if($errors->has('materia_nome'))
                    <span class="text-danger">{{ $errors->first('materia_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.materia_nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="abreviado_nome">{{ trans('cruds.boletin.fields.abreviado_nome') }}</label>
                <input class="form-control {{ $errors->has('abreviado_nome') ? 'is-invalid' : '' }}" type="text" name="abreviado_nome" id="abreviado_nome" value="{{ old('abreviado_nome', $boletin->abreviado_nome) }}">
                @if($errors->has('abreviado_nome'))
                    <span class="text-danger">{{ $errors->first('abreviado_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.abreviado_nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="professor_nome">{{ trans('cruds.boletin.fields.professor_nome') }}</label>
                <input class="form-control {{ $errors->has('professor_nome') ? 'is-invalid' : '' }}" type="text" name="professor_nome" id="professor_nome" value="{{ old('professor_nome', $boletin->professor_nome) }}">
                @if($errors->has('professor_nome'))
                    <span class="text-danger">{{ $errors->first('professor_nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boletin.fields.professor_nome_helper') }}</span>
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