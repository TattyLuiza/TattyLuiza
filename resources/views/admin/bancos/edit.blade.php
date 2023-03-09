@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.banco.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bancos.update", [$banco->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="padrao">{{ trans('cruds.banco.fields.padrao') }}</label>
                <input class="form-control {{ $errors->has('padrao') ? 'is-invalid' : '' }}" type="number" name="padrao" id="padrao" value="{{ old('padrao', $banco->padrao) }}" step="1" required>
                @if($errors->has('padrao'))
                    <span class="text-danger">{{ $errors->first('padrao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.padrao_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="listar">{{ trans('cruds.banco.fields.listar') }}</label>
                <input class="form-control {{ $errors->has('listar') ? 'is-invalid' : '' }}" type="number" name="listar" id="listar" value="{{ old('listar', $banco->listar) }}" step="1" required>
                @if($errors->has('listar'))
                    <span class="text-danger">{{ $errors->first('listar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.listar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cod">{{ trans('cruds.banco.fields.cod') }}</label>
                <input class="form-control {{ $errors->has('cod') ? 'is-invalid' : '' }}" type="number" name="cod" id="cod" value="{{ old('cod', $banco->cod) }}" step="1">
                @if($errors->has('cod'))
                    <span class="text-danger">{{ $errors->first('cod') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.cod_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome">{{ trans('cruds.banco.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $banco->nome) }}">
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="beneficiario">{{ trans('cruds.banco.fields.beneficiario') }}</label>
                <input class="form-control {{ $errors->has('beneficiario') ? 'is-invalid' : '' }}" type="text" name="beneficiario" id="beneficiario" value="{{ old('beneficiario', $banco->beneficiario) }}">
                @if($errors->has('beneficiario'))
                    <span class="text-danger">{{ $errors->first('beneficiario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.beneficiario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cnpj">{{ trans('cruds.banco.fields.cnpj') }}</label>
                <input class="form-control {{ $errors->has('cnpj') ? 'is-invalid' : '' }}" type="text" name="cnpj" id="cnpj" value="{{ old('cnpj', $banco->cnpj) }}">
                @if($errors->has('cnpj'))
                    <span class="text-danger">{{ $errors->first('cnpj') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.cnpj_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banco">{{ trans('cruds.banco.fields.banco') }}</label>
                <input class="form-control {{ $errors->has('banco') ? 'is-invalid' : '' }}" type="text" name="banco" id="banco" value="{{ old('banco', $banco->banco) }}">
                @if($errors->has('banco'))
                    <span class="text-danger">{{ $errors->first('banco') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.banco_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="taxa">{{ trans('cruds.banco.fields.taxa') }}</label>
                <input class="form-control {{ $errors->has('taxa') ? 'is-invalid' : '' }}" type="number" name="taxa" id="taxa" value="{{ old('taxa', $banco->taxa) }}" step="0.01">
                @if($errors->has('taxa'))
                    <span class="text-danger">{{ $errors->first('taxa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.taxa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agencia">{{ trans('cruds.banco.fields.agencia') }}</label>
                <input class="form-control {{ $errors->has('agencia') ? 'is-invalid' : '' }}" type="number" name="agencia" id="agencia" value="{{ old('agencia', $banco->agencia) }}" step="1">
                @if($errors->has('agencia'))
                    <span class="text-danger">{{ $errors->first('agencia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.agencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agencia_dv">{{ trans('cruds.banco.fields.agencia_dv') }}</label>
                <input class="form-control {{ $errors->has('agencia_dv') ? 'is-invalid' : '' }}" type="number" name="agencia_dv" id="agencia_dv" value="{{ old('agencia_dv', $banco->agencia_dv) }}" step="1">
                @if($errors->has('agencia_dv'))
                    <span class="text-danger">{{ $errors->first('agencia_dv') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.agencia_dv_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conta">{{ trans('cruds.banco.fields.conta') }}</label>
                <input class="form-control {{ $errors->has('conta') ? 'is-invalid' : '' }}" type="number" name="conta" id="conta" value="{{ old('conta', $banco->conta) }}" step="1">
                @if($errors->has('conta'))
                    <span class="text-danger">{{ $errors->first('conta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.conta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conta_dv">{{ trans('cruds.banco.fields.conta_dv') }}</label>
                <input class="form-control {{ $errors->has('conta_dv') ? 'is-invalid' : '' }}" type="number" name="conta_dv" id="conta_dv" value="{{ old('conta_dv', $banco->conta_dv) }}" step="1">
                @if($errors->has('conta_dv'))
                    <span class="text-danger">{{ $errors->first('conta_dv') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.conta_dv_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cedente">{{ trans('cruds.banco.fields.cedente') }}</label>
                <input class="form-control {{ $errors->has('cedente') ? 'is-invalid' : '' }}" type="number" name="cedente" id="cedente" value="{{ old('cedente', $banco->cedente) }}" step="1">
                @if($errors->has('cedente'))
                    <span class="text-danger">{{ $errors->first('cedente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.cedente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cedente_dv">{{ trans('cruds.banco.fields.cedente_dv') }}</label>
                <input class="form-control {{ $errors->has('cedente_dv') ? 'is-invalid' : '' }}" type="number" name="cedente_dv" id="cedente_dv" value="{{ old('cedente_dv', $banco->cedente_dv) }}" step="1">
                @if($errors->has('cedente_dv'))
                    <span class="text-danger">{{ $errors->first('cedente_dv') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.cedente_dv_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="carteira">{{ trans('cruds.banco.fields.carteira') }}</label>
                <input class="form-control {{ $errors->has('carteira') ? 'is-invalid' : '' }}" type="number" name="carteira" id="carteira" value="{{ old('carteira', $banco->carteira) }}" step="1">
                @if($errors->has('carteira'))
                    <span class="text-danger">{{ $errors->first('carteira') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.carteira_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="arquivo">{{ trans('cruds.banco.fields.arquivo') }}</label>
                <input class="form-control {{ $errors->has('arquivo') ? 'is-invalid' : '' }}" type="text" name="arquivo" id="arquivo" value="{{ old('arquivo', $banco->arquivo) }}">
                @if($errors->has('arquivo'))
                    <span class="text-danger">{{ $errors->first('arquivo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.arquivo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instrucoes">{{ trans('cruds.banco.fields.instrucoes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('instrucoes') ? 'is-invalid' : '' }}" name="instrucoes" id="instrucoes">{!! old('instrucoes', $banco->instrucoes) !!}</textarea>
                @if($errors->has('instrucoes'))
                    <span class="text-danger">{{ $errors->first('instrucoes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.instrucoes_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.bancos.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $banco->id ?? 0 }}');
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