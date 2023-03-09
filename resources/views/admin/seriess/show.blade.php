@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.series.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seriess.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.series.fields.id') }}
                        </th>
                        <td>
                            {{ $series->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.series.fields.tipo') }}
                        </th>
                        <td>
                            {{ $series->tipo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.series.fields.nome') }}
                        </th>
                        <td>
                            {{ $series->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.series.fields.turno') }}
                        </th>
                        <td>
                            {{ $series->turno }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.series.fields.valor') }}
                        </th>
                        <td>
                            {{ $series->valor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.series.fields.sala') }}
                        </th>
                        <td>
                            {{ $series->sala }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.series.fields.obs') }}
                        </th>
                        <td>
                            {{ $series->obs }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seriess.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection