@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.disciplina.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.disciplinas.update", [$disciplina->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.disciplina.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $disciplina->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.disciplina.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="abreviado">{{ trans('cruds.disciplina.fields.abreviado') }}</label>
                <input class="form-control {{ $errors->has('abreviado') ? 'is-invalid' : '' }}" type="text" name="abreviado" id="abreviado" value="{{ old('abreviado', $disciplina->abreviado) }}">
                @if($errors->has('abreviado'))
                    <span class="text-danger">{{ $errors->first('abreviado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.disciplina.fields.abreviado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipo">{{ trans('cruds.disciplina.fields.tipo') }}</label>
                <input class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" type="text" name="tipo" id="tipo" value="{{ old('tipo', $disciplina->tipo) }}">
                @if($errors->has('tipo'))
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.disciplina.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ementa">{{ trans('cruds.disciplina.fields.ementa') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('ementa') ? 'is-invalid' : '' }}" name="ementa" id="ementa">{!! old('ementa', $disciplina->ementa) !!}</textarea>
                @if($errors->has('ementa'))
                    <span class="text-danger">{{ $errors->first('ementa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.disciplina.fields.ementa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="livros">{{ trans('cruds.disciplina.fields.livros') }}</label>
                <input class="form-control {{ $errors->has('livros') ? 'is-invalid' : '' }}" type="text" name="livros" id="livros" value="{{ old('livros', $disciplina->livros) }}">
                @if($errors->has('livros'))
                    <span class="text-danger">{{ $errors->first('livros') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.disciplina.fields.livros_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ordem">{{ trans('cruds.disciplina.fields.ordem') }}</label>
                <input class="form-control {{ $errors->has('ordem') ? 'is-invalid' : '' }}" type="number" name="ordem" id="ordem" value="{{ old('ordem', $disciplina->ordem) }}" step="1">
                @if($errors->has('ordem'))
                    <span class="text-danger">{{ $errors->first('ordem') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.disciplina.fields.ordem_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipo_2">{{ trans('cruds.disciplina.fields.tipo_2') }}</label>
                <input class="form-control {{ $errors->has('tipo_2') ? 'is-invalid' : '' }}" type="number" name="tipo_2" id="tipo_2" value="{{ old('tipo_2', $disciplina->tipo_2) }}" step="1">
                @if($errors->has('tipo_2'))
                    <span class="text-danger">{{ $errors->first('tipo_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.disciplina.fields.tipo_2_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.disciplinas.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $disciplina->id ?? 0 }}');
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