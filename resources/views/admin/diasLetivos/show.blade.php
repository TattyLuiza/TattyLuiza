@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.diasLetivo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dias-letivos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.diasLetivo.fields.id') }}
                        </th>
                        <td>
                            {{ $diasLetivo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diasLetivo.fields.data') }}
                        </th>
                        <td>
                            {{ $diasLetivo->data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.diasLetivo.fields.ano') }}
                        </th>
                        <td>
                            {{ $diasLetivo->ano->ano ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dias-letivos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#dia_letivo_planos_aulas" role="tab" data-toggle="tab">
                {{ trans('cruds.planosAula.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#dia_letivo_diarios" role="tab" data-toggle="tab">
                {{ trans('cruds.diario.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="dia_letivo_planos_aulas">
            @includeIf('admin.diasLetivos.relationships.diaLetivoPlanosAulas', ['planosAulas' => $diasLetivo->diaLetivoPlanosAulas])
        </div>
        <div class="tab-pane" role="tabpanel" id="dia_letivo_diarios">
            @includeIf('admin.diasLetivos.relationships.diaLetivoDiarios', ['diarios' => $diasLetivo->diaLetivoDiarios])
        </div>
    </div>
</div>

@endsection