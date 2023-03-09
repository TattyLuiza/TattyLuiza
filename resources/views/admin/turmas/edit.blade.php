@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.turma.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.turmas.update", [$turma->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="serie_id">{{ trans('cruds.turma.fields.serie') }}</label>
                <select class="form-control select2 {{ $errors->has('serie') ? 'is-invalid' : '' }}" name="serie_id" id="serie_id" required>
                    @foreach($series as $id => $entry)
                        <option value="{{ $id }}" {{ (old('serie_id') ? old('serie_id') : $turma->serie->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('serie'))
                    <span class="text-danger">{{ $errors->first('serie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.serie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banco_id">{{ trans('cruds.turma.fields.banco') }}</label>
                <select class="form-control select2 {{ $errors->has('banco') ? 'is-invalid' : '' }}" name="banco_id" id="banco_id">
                    @foreach($bancos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('banco_id') ? old('banco_id') : $turma->banco->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('banco'))
                    <span class="text-danger">{{ $errors->first('banco') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.banco_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ano_id">{{ trans('cruds.turma.fields.ano') }}</label>
                <select class="form-control select2 {{ $errors->has('ano') ? 'is-invalid' : '' }}" name="ano_id" id="ano_id">
                    @foreach($anos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ano_id') ? old('ano_id') : $turma->ano->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ano'))
                    <span class="text-danger">{{ $errors->first('ano') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.ano_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipo">{{ trans('cruds.turma.fields.tipo') }}</label>
                <input class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" type="text" name="tipo" id="tipo" value="{{ old('tipo', $turma->tipo) }}">
                @if($errors->has('tipo'))
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome">{{ trans('cruds.turma.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $turma->nome) }}">
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sala">{{ trans('cruds.turma.fields.sala') }}</label>
                <input class="form-control {{ $errors->has('sala') ? 'is-invalid' : '' }}" type="text" name="sala" id="sala" value="{{ old('sala', $turma->sala) }}">
                @if($errors->has('sala'))
                    <span class="text-danger">{{ $errors->first('sala') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.sala_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="turno">{{ trans('cruds.turma.fields.turno') }}</label>
                <input class="form-control {{ $errors->has('turno') ? 'is-invalid' : '' }}" type="text" name="turno" id="turno" value="{{ old('turno', $turma->turno) }}">
                @if($errors->has('turno'))
                    <span class="text-danger">{{ $errors->first('turno') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.turno_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valor">{{ trans('cruds.turma.fields.valor') }}</label>
                <input class="form-control {{ $errors->has('valor') ? 'is-invalid' : '' }}" type="number" name="valor" id="valor" value="{{ old('valor', $turma->valor) }}" step="0.01">
                @if($errors->has('valor'))
                    <span class="text-danger">{{ $errors->first('valor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.valor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obs">{{ trans('cruds.turma.fields.obs') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('obs') ? 'is-invalid' : '' }}" name="obs" id="obs">{!! old('obs', $turma->obs) !!}</textarea>
                @if($errors->has('obs'))
                    <span class="text-danger">{{ $errors->first('obs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.obs_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="letivos">{{ trans('cruds.turma.fields.letivos') }}</label>
                <input class="form-control {{ $errors->has('letivos') ? 'is-invalid' : '' }}" type="number" name="letivos" id="letivos" value="{{ old('letivos', $turma->letivos) }}" step="1" required>
                @if($errors->has('letivos'))
                    <span class="text-danger">{{ $errors->first('letivos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.letivos_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="carga_horaria">{{ trans('cruds.turma.fields.carga_horaria') }}</label>
                <input class="form-control {{ $errors->has('carga_horaria') ? 'is-invalid' : '' }}" type="number" name="carga_horaria" id="carga_horaria" value="{{ old('carga_horaria', $turma->carga_horaria) }}" step="1" required>
                @if($errors->has('carga_horaria'))
                    <span class="text-danger">{{ $errors->first('carga_horaria') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.carga_horaria_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="falta">{{ trans('cruds.turma.fields.falta') }}</label>
                <input class="form-control {{ $errors->has('falta') ? 'is-invalid' : '' }}" type="text" name="falta" id="falta" value="{{ old('falta', $turma->falta) }}">
                @if($errors->has('falta'))
                    <span class="text-danger">{{ $errors->first('falta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.turma.fields.falta_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.turmas.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $turma->id ?? 0 }}');
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