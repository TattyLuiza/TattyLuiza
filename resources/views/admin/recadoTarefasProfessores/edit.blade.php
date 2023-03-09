@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.recadoTarefasProfessore.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.recado-tarefas-professores.update", [$recadoTarefasProfessore->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="id_professors">{{ trans('cruds.recadoTarefasProfessore.fields.id_professor') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('id_professors') ? 'is-invalid' : '' }}" name="id_professors[]" id="id_professors" multiple>
                    @foreach($id_professors as $id => $id_professor)
                        <option value="{{ $id }}" {{ (in_array($id, old('id_professors', [])) || $recadoTarefasProfessore->id_professors->contains($id)) ? 'selected' : '' }}>{{ $id_professor }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_professors'))
                    <span class="text-danger">{{ $errors->first('id_professors') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoTarefasProfessore.fields.id_professor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tipo">{{ trans('cruds.recadoTarefasProfessore.fields.tipo') }}</label>
                <input class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" type="text" name="tipo" id="tipo" value="{{ old('tipo', $recadoTarefasProfessore->tipo) }}" required>
                @if($errors->has('tipo'))
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoTarefasProfessore.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="turmas">{{ trans('cruds.recadoTarefasProfessore.fields.turmas') }}</label>
                <textarea class="form-control {{ $errors->has('turmas') ? 'is-invalid' : '' }}" name="turmas" id="turmas">{{ old('turmas', $recadoTarefasProfessore->turmas) }}</textarea>
                @if($errors->has('turmas'))
                    <span class="text-danger">{{ $errors->first('turmas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoTarefasProfessore.fields.turmas_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alunos">{{ trans('cruds.recadoTarefasProfessore.fields.alunos') }}</label>
                <textarea class="form-control {{ $errors->has('alunos') ? 'is-invalid' : '' }}" name="alunos" id="alunos">{{ old('alunos', $recadoTarefasProfessore->alunos) }}</textarea>
                @if($errors->has('alunos'))
                    <span class="text-danger">{{ $errors->first('alunos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoTarefasProfessore.fields.alunos_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="titulo">{{ trans('cruds.recadoTarefasProfessore.fields.titulo') }}</label>
                <input class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" type="text" name="titulo" id="titulo" value="{{ old('titulo', $recadoTarefasProfessore->titulo) }}" required>
                @if($errors->has('titulo'))
                    <span class="text-danger">{{ $errors->first('titulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoTarefasProfessore.fields.titulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="texto">{{ trans('cruds.recadoTarefasProfessore.fields.texto') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('texto') ? 'is-invalid' : '' }}" name="texto" id="texto">{!! old('texto', $recadoTarefasProfessore->texto) !!}</textarea>
                @if($errors->has('texto'))
                    <span class="text-danger">{{ $errors->first('texto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoTarefasProfessore.fields.texto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="arquivos">{{ trans('cruds.recadoTarefasProfessore.fields.arquivos') }}</label>
                <textarea class="form-control {{ $errors->has('arquivos') ? 'is-invalid' : '' }}" name="arquivos" id="arquivos">{{ old('arquivos', $recadoTarefasProfessore->arquivos) }}</textarea>
                @if($errors->has('arquivos'))
                    <span class="text-danger">{{ $errors->first('arquivos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoTarefasProfessore.fields.arquivos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agendamento_at">{{ trans('cruds.recadoTarefasProfessore.fields.agendamento_at') }}</label>
                <input class="form-control date {{ $errors->has('agendamento_at') ? 'is-invalid' : '' }}" type="text" name="agendamento_at" id="agendamento_at" value="{{ old('agendamento_at', $recadoTarefasProfessore->agendamento_at) }}">
                @if($errors->has('agendamento_at'))
                    <span class="text-danger">{{ $errors->first('agendamento_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadoTarefasProfessore.fields.agendamento_at_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.recado-tarefas-professores.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $recadoTarefasProfessore->id ?? 0 }}');
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