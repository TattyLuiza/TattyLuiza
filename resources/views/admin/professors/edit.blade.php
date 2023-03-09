@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.professor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.professors.update", [$professor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="foto">{{ trans('cruds.professor.fields.foto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto') ? 'is-invalid' : '' }}" id="foto-dropzone">
                </div>
                @if($errors->has('foto'))
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.foto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.professor.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $professor->status) }}" step="1" required>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.professor.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $professor->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="senha">{{ trans('cruds.professor.fields.senha') }}</label>
                <input class="form-control {{ $errors->has('senha') ? 'is-invalid' : '' }}" type="password" name="senha" id="senha">
                @if($errors->has('senha'))
                    <span class="text-danger">{{ $errors->first('senha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.senha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cargo">{{ trans('cruds.professor.fields.cargo') }}</label>
                <input class="form-control {{ $errors->has('cargo') ? 'is-invalid' : '' }}" type="text" name="cargo" id="cargo" value="{{ old('cargo', $professor->cargo) }}">
                @if($errors->has('cargo'))
                    <span class="text-danger">{{ $errors->first('cargo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.cargo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banco">{{ trans('cruds.professor.fields.banco') }}</label>
                <input class="form-control {{ $errors->has('banco') ? 'is-invalid' : '' }}" type="text" name="banco" id="banco" value="{{ old('banco', $professor->banco) }}">
                @if($errors->has('banco'))
                    <span class="text-danger">{{ $errors->first('banco') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.banco_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pis">{{ trans('cruds.professor.fields.pis') }}</label>
                <input class="form-control {{ $errors->has('pis') ? 'is-invalid' : '' }}" type="text" name="pis" id="pis" value="{{ old('pis', $professor->pis) }}">
                @if($errors->has('pis'))
                    <span class="text-danger">{{ $errors->first('pis') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.pis_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ctps">{{ trans('cruds.professor.fields.ctps') }}</label>
                <input class="form-control {{ $errors->has('ctps') ? 'is-invalid' : '' }}" type="text" name="ctps" id="ctps" value="{{ old('ctps', $professor->ctps) }}">
                @if($errors->has('ctps'))
                    <span class="text-danger">{{ $errors->first('ctps') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.ctps_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="admissao">{{ trans('cruds.professor.fields.admissao') }}</label>
                <input class="form-control date {{ $errors->has('admissao') ? 'is-invalid' : '' }}" type="text" name="admissao" id="admissao" value="{{ old('admissao', $professor->admissao) }}" required>
                @if($errors->has('admissao'))
                    <span class="text-danger">{{ $errors->first('admissao') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.admissao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cpf">{{ trans('cruds.professor.fields.cpf') }}</label>
                <input class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}" type="text" name="cpf" id="cpf" value="{{ old('cpf', $professor->cpf) }}">
                @if($errors->has('cpf'))
                    <span class="text-danger">{{ $errors->first('cpf') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.cpf_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rg">{{ trans('cruds.professor.fields.rg') }}</label>
                <input class="form-control {{ $errors->has('rg') ? 'is-invalid' : '' }}" type="text" name="rg" id="rg" value="{{ old('rg', $professor->rg) }}">
                @if($errors->has('rg'))
                    <span class="text-danger">{{ $errors->first('rg') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.rg_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.professor.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $professor->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nascimento">{{ trans('cruds.professor.fields.nascimento') }}</label>
                <input class="form-control date {{ $errors->has('nascimento') ? 'is-invalid' : '' }}" type="text" name="nascimento" id="nascimento" value="{{ old('nascimento', $professor->nascimento) }}">
                @if($errors->has('nascimento'))
                    <span class="text-danger">{{ $errors->first('nascimento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.nascimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="naturalidade">{{ trans('cruds.professor.fields.naturalidade') }}</label>
                <input class="form-control {{ $errors->has('naturalidade') ? 'is-invalid' : '' }}" type="text" name="naturalidade" id="naturalidade" value="{{ old('naturalidade', $professor->naturalidade) }}">
                @if($errors->has('naturalidade'))
                    <span class="text-danger">{{ $errors->first('naturalidade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.naturalidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.professor.fields.sexo') }}</label>
                <select class="form-control {{ $errors->has('sexo') ? 'is-invalid' : '' }}" name="sexo" id="sexo">
                    <option value disabled {{ old('sexo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Professor::SEXO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sexo', $professor->sexo) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sexo'))
                    <span class="text-danger">{{ $errors->first('sexo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.sexo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rua">{{ trans('cruds.professor.fields.rua') }}</label>
                <input class="form-control {{ $errors->has('rua') ? 'is-invalid' : '' }}" type="text" name="rua" id="rua" value="{{ old('rua', $professor->rua) }}">
                @if($errors->has('rua'))
                    <span class="text-danger">{{ $errors->first('rua') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.rua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero">{{ trans('cruds.professor.fields.numero') }}</label>
                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="text" name="numero" id="numero" value="{{ old('numero', $professor->numero) }}">
                @if($errors->has('numero'))
                    <span class="text-danger">{{ $errors->first('numero') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.numero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="complemento">{{ trans('cruds.professor.fields.complemento') }}</label>
                <input class="form-control {{ $errors->has('complemento') ? 'is-invalid' : '' }}" type="text" name="complemento" id="complemento" value="{{ old('complemento', $professor->complemento) }}">
                @if($errors->has('complemento'))
                    <span class="text-danger">{{ $errors->first('complemento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.complemento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bairro">{{ trans('cruds.professor.fields.bairro') }}</label>
                <input class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text" name="bairro" id="bairro" value="{{ old('bairro', $professor->bairro) }}">
                @if($errors->has('bairro'))
                    <span class="text-danger">{{ $errors->first('bairro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.bairro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cep">{{ trans('cruds.professor.fields.cep') }}</label>
                <input class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}" type="text" name="cep" id="cep" value="{{ old('cep', $professor->cep) }}">
                @if($errors->has('cep'))
                    <span class="text-danger">{{ $errors->first('cep') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.cep_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cidade">{{ trans('cruds.professor.fields.cidade') }}</label>
                <input class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text" name="cidade" id="cidade" value="{{ old('cidade', $professor->cidade) }}">
                @if($errors->has('cidade'))
                    <span class="text-danger">{{ $errors->first('cidade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.cidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estado">{{ trans('cruds.professor.fields.estado') }}</label>
                <input class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" type="text" name="estado" id="estado" value="{{ old('estado', $professor->estado) }}">
                @if($errors->has('estado'))
                    <span class="text-danger">{{ $errors->first('estado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefone">{{ trans('cruds.professor.fields.telefone') }}</label>
                <input class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" type="text" name="telefone" id="telefone" value="{{ old('telefone', $professor->telefone) }}">
                @if($errors->has('telefone'))
                    <span class="text-danger">{{ $errors->first('telefone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.telefone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="celular">{{ trans('cruds.professor.fields.celular') }}</label>
                <input class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}" type="text" name="celular" id="celular" value="{{ old('celular', $professor->celular) }}">
                @if($errors->has('celular'))
                    <span class="text-danger">{{ $errors->first('celular') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.celular_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.professor.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $professor->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obs">{{ trans('cruds.professor.fields.obs') }}</label>
                <textarea class="form-control {{ $errors->has('obs') ? 'is-invalid' : '' }}" name="obs" id="obs">{{ old('obs', $professor->obs) }}</textarea>
                @if($errors->has('obs'))
                    <span class="text-danger">{{ $errors->first('obs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.professor.fields.obs_helper') }}</span>
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
    Dropzone.options.fotoDropzone = {
    url: '{{ route('admin.professors.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto"]').remove()
      $('form').append('<input type="hidden" name="foto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($professor) && $professor->foto)
      var file = {!! json_encode($professor->foto) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection