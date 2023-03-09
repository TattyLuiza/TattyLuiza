@extends('layouts.admin')
@section('content')
@can('series_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.seriess.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.series.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.series.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Series">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.series.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.series.fields.tipo') }}
                        </th>
                        <th>
                            {{ trans('cruds.series.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.series.fields.turno') }}
                        </th>
                        <th>
                            {{ trans('cruds.series.fields.valor') }}
                        </th>
                        <th>
                            {{ trans('cruds.series.fields.sala') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seriess as $key => $series)
                        <tr data-entry-id="{{ $series->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $series->id ?? '' }}
                            </td>
                            <td>
                                {{ $series->tipo ?? '' }}
                            </td>
                            <td>
                                {{ $series->nome ?? '' }}
                            </td>
                            <td>
                                {{ $series->turno ?? '' }}
                            </td>
                            <td>
                                {{ $series->valor ?? '' }}
                            </td>
                            <td>
                                {{ $series->sala ?? '' }}
                            </td>
                            <td>
                                @can('series_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.seriess.show', $series->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('series_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.seriess.edit', $series->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('series_delete')
                                    <form action="{{ route('admin.seriess.destroy', $series->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('series_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.seriess.massDestroy') }}",
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
  let table = $('.datatable-Series:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection