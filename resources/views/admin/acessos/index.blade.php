@extends('layouts.admin')
@section('content')
@can('acesso_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.acessos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.acesso.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.acesso.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Acesso">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.acesso.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.acesso.fields.usuario') }}
                        </th>
                        <th>
                            {{ trans('cruds.acesso.fields.url') }}
                        </th>
                        <th>
                            {{ trans('cruds.acesso.fields.ip') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($acessos as $key => $acesso)
                        <tr data-entry-id="{{ $acesso->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $acesso->id ?? '' }}
                            </td>
                            <td>
                                {{ $acesso->usuario ?? '' }}
                            </td>
                            <td>
                                {{ $acesso->url ?? '' }}
                            </td>
                            <td>
                                {{ $acesso->ip ?? '' }}
                            </td>
                            <td>
                                @can('acesso_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.acessos.show', $acesso->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('acesso_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.acessos.edit', $acesso->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('acesso_delete')
                                    <form action="{{ route('admin.acessos.destroy', $acesso->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('acesso_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.acessos.massDestroy') }}",
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
  let table = $('.datatable-Acesso:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection