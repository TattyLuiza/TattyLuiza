@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.recadosTarefasAluno.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.recados-tarefas-alunos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_recado_tarefa_professor_id">{{ trans('cruds.recadosTarefasAluno.fields.id_recado_tarefa_professor') }}</label>
                <select class="form-control select2 {{ $errors->has('id_recado_tarefa_professor') ? 'is-invalid' : '' }}" name="id_recado_tarefa_professor_id" id="id_recado_tarefa_professor_id">
                    @foreach($id_recado_tarefa_professors as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_recado_tarefa_professor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_recado_tarefa_professor'))
                    <span class="text-danger">{{ $errors->first('id_recado_tarefa_professor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.id_recado_tarefa_professor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_professor_id">{{ trans('cruds.recadosTarefasAluno.fields.id_professor') }}</label>
                <select class="form-control select2 {{ $errors->has('id_professor') ? 'is-invalid' : '' }}" name="id_professor_id" id="id_professor_id" required>
                    @foreach($id_professors as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_professor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_professor'))
                    <span class="text-danger">{{ $errors->first('id_professor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.id_professor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_alunos">{{ trans('cruds.recadosTarefasAluno.fields.id_aluno') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('id_alunos') ? 'is-invalid' : '' }}" name="id_alunos[]" id="id_alunos" multiple>
                    @foreach($id_alunos as $id => $id_aluno)
                        <option value="{{ $id }}" {{ in_array($id, old('id_alunos', [])) ? 'selected' : '' }}>{{ $id_aluno }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_alunos'))
                    <span class="text-danger">{{ $errors->first('id_alunos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.id_aluno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="titulo">{{ trans('cruds.recadosTarefasAluno.fields.titulo') }}</label>
                <input class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" type="text" name="titulo" id="titulo" value="{{ old('titulo', '') }}" required>
                @if($errors->has('titulo'))
                    <span class="text-danger">{{ $errors->first('titulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.titulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="texto">{{ trans('cruds.recadosTarefasAluno.fields.texto') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('texto') ? 'is-invalid' : '' }}" name="texto" id="texto">{!! old('texto') !!}</textarea>
                @if($errors->has('texto'))
                    <span class="text-danger">{{ $errors->first('texto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.texto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="arquivo">{{ trans('cruds.recadosTarefasAluno.fields.arquivo') }}</label>
                <textarea class="form-control {{ $errors->has('arquivo') ? 'is-invalid' : '' }}" name="arquivo" id="arquivo">{{ old('arquivo') }}</textarea>
                @if($errors->has('arquivo'))
                    <span class="text-danger">{{ $errors->first('arquivo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.arquivo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tipo">{{ trans('cruds.recadosTarefasAluno.fields.tipo') }}</label>
                <input class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" type="text" name="tipo" id="tipo" value="{{ old('tipo', '') }}" required>
                @if($errors->has('tipo'))
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.tipo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="modo">{{ trans('cruds.recadosTarefasAluno.fields.modo') }}</label>
                <input class="form-control {{ $errors->has('modo') ? 'is-invalid' : '' }}" type="text" name="modo" id="modo" value="{{ old('modo', '') }}" required>
                @if($errors->has('modo'))
                    <span class="text-danger">{{ $errors->first('modo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.modo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="leu">{{ trans('cruds.recadosTarefasAluno.fields.leu') }}</label>
                <input class="form-control {{ $errors->has('leu') ? 'is-invalid' : '' }}" type="number" name="leu" id="leu" value="{{ old('leu', '') }}" step="1" required>
                @if($errors->has('leu'))
                    <span class="text-danger">{{ $errors->first('leu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.leu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agendamento">{{ trans('cruds.recadosTarefasAluno.fields.agendamento') }}</label>
                <input class="form-control date {{ $errors->has('agendamento') ? 'is-invalid' : '' }}" type="text" name="agendamento" id="agendamento" value="{{ old('agendamento') }}">
                @if($errors->has('agendamento'))
                    <span class="text-danger">{{ $errors->first('agendamento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.agendamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lida_at">{{ trans('cruds.recadosTarefasAluno.fields.lida_at') }}</label>
                <input class="form-control date {{ $errors->has('lida_at') ? 'is-invalid' : '' }}" type="text" name="lida_at" id="lida_at" value="{{ old('lida_at') }}">
                @if($errors->has('lida_at'))
                    <span class="text-danger">{{ $errors->first('lida_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.recadosTarefasAluno.fields.lida_at_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.recados-tarefas-alunos.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $recadosTarefasAluno->id ?? 0 }}');
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