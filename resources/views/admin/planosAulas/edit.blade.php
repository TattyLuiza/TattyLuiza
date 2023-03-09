@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.planosAula.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.planos-aulas.update", [$planosAula->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="horario_id">{{ trans('cruds.planosAula.fields.horario') }}</label>
                <select class="form-control select2 {{ $errors->has('horario') ? 'is-invalid' : '' }}" name="horario_id" id="horario_id" required>
                    @foreach($horarios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('horario_id') ? old('horario_id') : $planosAula->horario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('horario'))
                    <span class="text-danger">{{ $errors->first('horario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.horario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="disciplina_id">{{ trans('cruds.planosAula.fields.disciplina') }}</label>
                <select class="form-control select2 {{ $errors->has('disciplina') ? 'is-invalid' : '' }}" name="disciplina_id" id="disciplina_id" required>
                    @foreach($disciplinas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('disciplina_id') ? old('disciplina_id') : $planosAula->disciplina->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('disciplina'))
                    <span class="text-danger">{{ $errors->first('disciplina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.disciplina_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="turma_id">{{ trans('cruds.planosAula.fields.turma') }}</label>
                <select class="form-control select2 {{ $errors->has('turma') ? 'is-invalid' : '' }}" name="turma_id" id="turma_id" required>
                    @foreach($turmas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('turma_id') ? old('turma_id') : $planosAula->turma->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('turma'))
                    <span class="text-danger">{{ $errors->first('turma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.turma_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="professor_id">{{ trans('cruds.planosAula.fields.professor') }}</label>
                <select class="form-control select2 {{ $errors->has('professor') ? 'is-invalid' : '' }}" name="professor_id" id="professor_id" required>
                    @foreach($professors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('professor_id') ? old('professor_id') : $planosAula->professor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('professor'))
                    <span class="text-danger">{{ $errors->first('professor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.professor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dia_letivo_id">{{ trans('cruds.planosAula.fields.dia_letivo') }}</label>
                <select class="form-control select2 {{ $errors->has('dia_letivo') ? 'is-invalid' : '' }}" name="dia_letivo_id" id="dia_letivo_id" required>
                    @foreach($dia_letivos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dia_letivo_id') ? old('dia_letivo_id') : $planosAula->dia_letivo->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dia_letivo'))
                    <span class="text-danger">{{ $errors->first('dia_letivo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.dia_letivo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bimestre">{{ trans('cruds.planosAula.fields.bimestre') }}</label>
                <input class="form-control {{ $errors->has('bimestre') ? 'is-invalid' : '' }}" type="text" name="bimestre" id="bimestre" value="{{ old('bimestre', $planosAula->bimestre) }}">
                @if($errors->has('bimestre'))
                    <span class="text-danger">{{ $errors->first('bimestre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.bimestre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="carga_horaria">{{ trans('cruds.planosAula.fields.carga_horaria') }}</label>
                <input class="form-control {{ $errors->has('carga_horaria') ? 'is-invalid' : '' }}" type="text" name="carga_horaria" id="carga_horaria" value="{{ old('carga_horaria', $planosAula->carga_horaria) }}">
                @if($errors->has('carga_horaria'))
                    <span class="text-danger">{{ $errors->first('carga_horaria') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.carga_horaria_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="apostila">{{ trans('cruds.planosAula.fields.apostila') }}</label>
                <input class="form-control {{ $errors->has('apostila') ? 'is-invalid' : '' }}" type="text" name="apostila" id="apostila" value="{{ old('apostila', $planosAula->apostila) }}">
                @if($errors->has('apostila'))
                    <span class="text-danger">{{ $errors->first('apostila') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.apostila_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="capitulo">{{ trans('cruds.planosAula.fields.capitulo') }}</label>
                <input class="form-control {{ $errors->has('capitulo') ? 'is-invalid' : '' }}" type="text" name="capitulo" id="capitulo" value="{{ old('capitulo', $planosAula->capitulo) }}">
                @if($errors->has('capitulo'))
                    <span class="text-danger">{{ $errors->first('capitulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.capitulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conteudo">{{ trans('cruds.planosAula.fields.conteudo') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('conteudo') ? 'is-invalid' : '' }}" name="conteudo" id="conteudo">{!! old('conteudo', $planosAula->conteudo) !!}</textarea>
                @if($errors->has('conteudo'))
                    <span class="text-danger">{{ $errors->first('conteudo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.conteudo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="habilidades">{{ trans('cruds.planosAula.fields.habilidades') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('habilidades') ? 'is-invalid' : '' }}" name="habilidades" id="habilidades">{!! old('habilidades', $planosAula->habilidades) !!}</textarea>
                @if($errors->has('habilidades'))
                    <span class="text-danger">{{ $errors->first('habilidades') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.habilidades_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="metodologia">{{ trans('cruds.planosAula.fields.metodologia') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('metodologia') ? 'is-invalid' : '' }}" name="metodologia" id="metodologia">{!! old('metodologia', $planosAula->metodologia) !!}</textarea>
                @if($errors->has('metodologia'))
                    <span class="text-danger">{{ $errors->first('metodologia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.metodologia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="avaliacao">{{ trans('cruds.planosAula.fields.avaliacao') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('avaliacao') ? 'is-invalid' : '' }}" name="avaliacao" id="avaliacao">{!! old('avaliacao', $planosAula->avaliacao) !!}</textarea>
                @if($errors->has('avaliacao'))
                    <span class="text-danger">{{ $errors->first('avaliacao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.avaliacao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.planosAula.fields.link') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('link') ? 'is-invalid' : '' }}" name="link" id="link">{!! old('link', $planosAula->link) !!}</textarea>
                @if($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recurso">{{ trans('cruds.planosAula.fields.recurso') }}</label>
                <textarea class="form-control {{ $errors->has('recurso') ? 'is-invalid' : '' }}" name="recurso" id="recurso">{{ old('recurso', $planosAula->recurso) }}</textarea>
                @if($errors->has('recurso'))
                    <span class="text-danger">{{ $errors->first('recurso') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.recurso_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="atividade">{{ trans('cruds.planosAula.fields.atividade') }}</label>
                <textarea class="form-control {{ $errors->has('atividade') ? 'is-invalid' : '' }}" name="atividade" id="atividade">{{ old('atividade', $planosAula->atividade) }}</textarea>
                @if($errors->has('atividade'))
                    <span class="text-danger">{{ $errors->first('atividade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.atividade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="leitura">{{ trans('cruds.planosAula.fields.leitura') }}</label>
                <textarea class="form-control {{ $errors->has('leitura') ? 'is-invalid' : '' }}" name="leitura" id="leitura">{{ old('leitura', $planosAula->leitura) }}</textarea>
                @if($errors->has('leitura'))
                    <span class="text-danger">{{ $errors->first('leitura') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.planosAula.fields.leitura_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.planos-aulas.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $planosAula->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection