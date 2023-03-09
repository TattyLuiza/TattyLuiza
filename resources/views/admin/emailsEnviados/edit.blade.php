@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.emailsEnviado.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.emails-enviados.update", [$emailsEnviado->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="id_emails">{{ trans('cruds.emailsEnviado.fields.id_email') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('id_emails') ? 'is-invalid' : '' }}" name="id_emails[]" id="id_emails" multiple required>
                    @foreach($id_emails as $id => $id_email)
                        <option value="{{ $id }}" {{ (in_array($id, old('id_emails', [])) || $emailsEnviado->id_emails->contains($id)) ? 'selected' : '' }}>{{ $id_email }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_emails'))
                    <span class="text-danger">{{ $errors->first('id_emails') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emailsEnviado.fields.id_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.emailsEnviado.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $emailsEnviado->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emailsEnviado.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.emailsEnviado.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $emailsEnviado->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emailsEnviado.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="clicou">{{ trans('cruds.emailsEnviado.fields.clicou') }}</label>
                <input class="form-control {{ $errors->has('clicou') ? 'is-invalid' : '' }}" type="number" name="clicou" id="clicou" value="{{ old('clicou', $emailsEnviado->clicou) }}" step="1" required>
                @if($errors->has('clicou'))
                    <span class="text-danger">{{ $errors->first('clicou') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emailsEnviado.fields.clicou_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.emailsEnviado.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $emailsEnviado->status) }}" step="1" required>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emailsEnviado.fields.status_helper') }}</span>
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