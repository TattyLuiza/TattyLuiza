@extends('layouts.admin')
@section('content')
@can('turma_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.turmas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.turma.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.turma.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Turma">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.serie') }}
                        </th>
                        <th>
                            {{ trans('cruds.series.fields.turno') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.banco') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.agencia') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.agencia_dv') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.conta') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.conta_dv') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.ano') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.tipo') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.sala') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.turno') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.valor') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.letivos') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.carga_horaria') }}
                        </th>
                        <th>
                            {{ trans('cruds.turma.fields.falta') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($turmas as $key => $turma)
                        <tr data-entry-id="{{ $turma->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $turma->id ?? '' }}
                            </td>
                            <td>
                                {{ $turma->serie->nome ?? '' }}
                            </td>
                            <td>
                                {{ $turma->serie->turno ?? '' }}
                            </td>
                            <td>
                                {{ $turma->banco->nome ?? '' }}
                            </td>
                            <td>
                                {{ $turma->banco->agencia ?? '' }}
                            </td>
                            <td>
                                {{ $turma->banco->agencia_dv ?? '' }}
                            </td>
                            <td>
                                {{ $turma->banco->conta ?? '' }}
                            </td>
                            <td>
                                {{ $turma->banco->conta_dv ?? '' }}
                            </td>
                            <td>
                                {{ $turma->ano->ano ?? '' }}
                            </td>
                            <td>
                                {{ $turma->tipo ?? '' }}
                            </td>
                            <td>
                                {{ $turma->nome ?? '' }}
                            </td>
                            <td>
                                {{ $turma->sala ?? '' }}
                            </td>
                            <td>
                                {{ $turma->turno ?? '' }}
                            </td>
                            <td>
                                {{ $turma->valor ?? '' }}
                            </td>
                            <td>
                                {{ $turma->letivos ?? '' }}
                            </td>
                            <td>
                                {{ $turma->carga_horaria ?? '' }}
                            </td>
                            <td>
                                {{ $turma->falta ?? '' }}
                            </td>
                            <td>
                                @can('turma_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.turmas.show', $turma->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('turma_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.turmas.edit', $turma->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('turma_delete')
                                    <form action="{{ route('admin.turmas.destroy', $turma->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('turma_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.turmas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Turma:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection