@extends('layouts.admin')
@section('content')
@can('ano_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.anos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.ano.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.ano.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Ano">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.ano') }}
                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.logomarca') }}
                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.escola') }}
                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_5') }}
                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.portaria_6') }}
                        </th>
                        <th>
                            {{ trans('cruds.ano.fields.telefones') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anos as $key => $ano)
                        <tr data-entry-id="{{ $ano->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ano->id ?? '' }}
                            </td>
                            <td>
                                {{ $ano->ano ?? '' }}
                            </td>
                            <td>
                                {{ $ano->logomarca ?? '' }}
                            </td>
                            <td>
                                {{ $ano->escola ?? '' }}
                            </td>
                            <td>
                                {{ $ano->portaria_1 ?? '' }}
                            </td>
                            <td>
                                {{ $ano->portaria_2 ?? '' }}
                            </td>
                            <td>
                                {{ $ano->portaria_3 ?? '' }}
                            </td>
                            <td>
                                {{ $ano->portaria_4 ?? '' }}
                            </td>
                            <td>
                                {{ $ano->portaria_5 ?? '' }}
                            </td>
                            <td>
                                {{ $ano->portaria_6 ?? '' }}
                            </td>
                            <td>
                                {{ $ano->telefones ?? '' }}
                            </td>
                            <td>
                                @can('ano_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.anos.show', $ano->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('ano_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.anos.edit', $ano->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('ano_delete')
                                    <form action="{{ route('admin.anos.destroy', $ano->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('ano_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.anos.massDestroy') }}",
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
  let table = $('.datatable-Ano:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection