@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.recadoProfessore.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.recado-professores.update", [$recadoProfessore->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="id_remetentes">{{ trans('cruds.recadoProfessore.fields.id_remetente') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('id_remetentes') ? 'is-invalid' : '' }}" name="id_remetentes[]" id="id_remetentes" multiple>
                    @foreach($id_remetentes as $id => $id_remetente)
                        <option value="{{ $id }}" {{ (in_array($id, old('id_remetentes', [])) || $recadoProfessore->id_remetentes->contains($id)) ? 'selected' : '' }}>{{ $id_remetente }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_remetentes'))
                    <span class="text-danger">{{ $errors->first('id_remetentes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoProfessore.fields.id_remetente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="titulo">{{ trans('cruds.recadoProfessore.fields.titulo') }}</label>
                <input class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" type="text" name="titulo" id="titulo" value="{{ old('titulo', $recadoProfessore->titulo) }}">
                @if($errors->has('titulo'))
                    <span class="text-danger">{{ $errors->first('titulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoProfessore.fields.titulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="texto">{{ trans('cruds.recadoProfessore.fields.texto') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('texto') ? 'is-invalid' : '' }}" name="texto" id="texto">{!! old('texto', $recadoProfessore->texto) !!}</textarea>
                @if($errors->has('texto'))
                    <span class="text-danger">{{ $errors->first('texto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoProfessore.fields.texto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="leu">{{ trans('cruds.recadoProfessore.fields.leu') }}</label>
                <input class="form-control {{ $errors->has('leu') ? 'is-invalid' : '' }}" type="number" name="leu" id="leu" value="{{ old('leu', $recadoProfessore->leu) }}" step="1">
                @if($errors->has('leu'))
                    <span class="text-danger">{{ $errors->first('leu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoProfessore.fields.leu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lida_at">{{ trans('cruds.recadoProfessore.fields.lida_at') }}</label>
                <input class="form-control date {{ $errors->has('lida_at') ? 'is-invalid' : '' }}" type="text" name="lida_at" id="lida_at" value="{{ old('lida_at', $recadoProfessore->lida_at) }}">
                @if($errors->has('lida_at'))
                    <span class="text-danger">{{ $errors->first('lida_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoProfessore.fields.lida_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_destinatario_id">{{ trans('cruds.recadoProfessore.fields.id_destinatario') }}</label>
                <select class="form-control select2 {{ $errors->has('id_destinatario') ? 'is-invalid' : '' }}" name="id_destinatario_id" id="id_destinatario_id">
                    @foreach($id_destinatarios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_destinatario_id') ? old('id_destinatario_id') : $recadoProfessore->id_destinatario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_destinatario'))
                    <span class="text-danger">{{ $errors->first('id_destinatario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoProfessore.fields.id_destinatario_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.recado-professores.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $recadoProfessore->id ?? 0 }}');
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