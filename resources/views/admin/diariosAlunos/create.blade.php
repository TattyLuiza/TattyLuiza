@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.diariosAluno.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.diarios-alunos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="diario_id">{{ trans('cruds.diariosAluno.fields.diario') }}</label>
                <select class="form-control select2 {{ $errors->has('diario') ? 'is-invalid' : '' }}" name="diario_id" id="diario_id" required>
                    @foreach($diarios as $id => $entry)
                        <option value="{{ $id }}" {{ old('diario_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('diario'))
                    <span class="text-danger">{{ $errors->first('diario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diariosAluno.fields.diario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="matricula_id">{{ trans('cruds.diariosAluno.fields.matricula') }}</label>
                <select class="form-control select2 {{ $errors->has('matricula') ? 'is-invalid' : '' }}" name="matricula_id" id="matricula_id" required>
                    @foreach($matriculas as $id => $entry)
                        <option value="{{ $id }}" {{ old('matricula_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('matricula'))
                    <span class="text-danger">{{ $errors->first('matricula') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diariosAluno.fields.matricula_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="presenca">{{ trans('cruds.diariosAluno.fields.presenca') }}</label>
                <input class="form-control {{ $errors->has('presenca') ? 'is-invalid' : '' }}" type="text" name="presenca" id="presenca" value="{{ old('presenca', 'F') }}">
                @if($errors->has('presenca'))
                    <span class="text-danger">{{ $errors->first('presenca') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diariosAluno.fields.presenca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="atestado">{{ trans('cruds.diariosAluno.fields.atestado') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('atestado') ? 'is-invalid' : '' }}" name="atestado" id="atestado">{!! old('atestado') !!}</textarea>
                @if($errors->has('atestado'))
                    <span class="text-danger">{{ $errors->first('atestado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diariosAluno.fields.atestado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obs">{{ trans('cruds.diariosAluno.fields.obs') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('obs') ? 'is-invalid' : '' }}" name="obs" id="obs">{!! old('obs') !!}</textarea>
                @if($errors->has('obs'))
                    <span class="text-danger">{{ $errors->first('obs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diariosAluno.fields.obs_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.diariosAluno.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', '') }}" step="1" required>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diariosAluno.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="arquivo">{{ trans('cruds.diariosAluno.fields.arquivo') }}</label>
                <textarea class="form-control {{ $errors->has('arquivo') ? 'is-invalid' : '' }}" name="arquivo" id="arquivo">{{ old('arquivo') }}</textarea>
                @if($errors->has('arquivo'))
                    <span class="text-danger">{{ $errors->first('arquivo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.diariosAluno.fields.arquivo_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.diarios-alunos.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $diariosAluno->id ?? 0 }}');
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