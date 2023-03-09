@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.diario.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.diarios.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="dia_letivo_id">{{ trans('cruds.diario.fields.dia_letivo') }}</label>
                <select class="form-control select2 {{ $errors->has('dia_letivo') ? 'is-invalid' : '' }}" name="dia_letivo_id" id="dia_letivo_id" required>
                    @foreach($dia_letivos as $id => $entry)
                        <option value="{{ $id }}" {{ old('dia_letivo_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dia_letivo'))
                    <span class="text-danger">{{ $errors->first('dia_letivo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diario.fields.dia_letivo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="horario_id">{{ trans('cruds.diario.fields.horario') }}</label>
                <select class="form-control select2 {{ $errors->has('horario') ? 'is-invalid' : '' }}" name="horario_id" id="horario_id" required>
                    @foreach($horarios as $id => $entry)
                        <option value="{{ $id }}" {{ old('horario_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('horario'))
                    <span class="text-danger">{{ $errors->first('horario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diario.fields.horario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="turma_id">{{ trans('cruds.diario.fields.turma') }}</label>
                <select class="form-control select2 {{ $errors->has('turma') ? 'is-invalid' : '' }}" name="turma_id" id="turma_id" required>
                    @foreach($turmas as $id => $entry)
                        <option value="{{ $id }}" {{ old('turma_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('turma'))
                    <span class="text-danger">{{ $errors->first('turma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diario.fields.turma_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="disciplina_id">{{ trans('cruds.diario.fields.disciplina') }}</label>
                <select class="form-control select2 {{ $errors->has('disciplina') ? 'is-invalid' : '' }}" name="disciplina_id" id="disciplina_id" required>
                    @foreach($disciplinas as $id => $entry)
                        <option value="{{ $id }}" {{ old('disciplina_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('disciplina'))
                    <span class="text-danger">{{ $errors->first('disciplina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diario.fields.disciplina_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="professor_id">{{ trans('cruds.diario.fields.professor') }}</label>
                <select class="form-control select2 {{ $errors->has('professor') ? 'is-invalid' : '' }}" name="professor_id" id="professor_id">
                    @foreach($professors as $id => $entry)
                        <option value="{{ $id }}" {{ old('professor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('professor'))
                    <span class="text-danger">{{ $errors->first('professor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diario.fields.professor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conteudo">{{ trans('cruds.diario.fields.conteudo') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('conteudo') ? 'is-invalid' : '' }}" name="conteudo" id="conteudo">{!! old('conteudo') !!}</textarea>
                @if($errors->has('conteudo'))
                    <span class="text-danger">{{ $errors->first('conteudo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diario.fields.conteudo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.diario.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', '') }}" step="1" required>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diario.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obs">{{ trans('cruds.diario.fields.obs') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('obs') ? 'is-invalid' : '' }}" name="obs" id="obs">{!! old('obs') !!}</textarea>
                @if($errors->has('obs'))
                    <span class="text-danger">{{ $errors->first('obs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diario.fields.obs_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.diarios.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $diario->id ?? 0 }}');
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