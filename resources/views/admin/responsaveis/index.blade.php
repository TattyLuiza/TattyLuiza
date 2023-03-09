@extends('layouts.admin')
@section('content')
@can('responsavei_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.responsaveis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.responsavei.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.responsavei.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Responsavei">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.responsavei.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavei.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavei.fields.rg') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavei.fields.cpf') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavei.fields.complemento') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavei.fields.numero') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavei.fields.bairro') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsavei.fields.celular') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($responsaveis as $key => $responsavei)
                        <tr data-entry-id="{{ $responsavei->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $responsavei->id ?? '' }}
                            </td>
                            <td>
                                {{ $responsavei->nome ?? '' }}
                            </td>
                            <td>
                                {{ $responsavei->rg ?? '' }}
                            </td>
                            <td>
                                {{ $responsavei->cpf ?? '' }}
                            </td>
                            <td>
                                {{ $responsavei->complemento ?? '' }}
                            </td>
                            <td>
                                {{ $responsavei->numero ?? '' }}
                            </td>
                            <td>
                                {{ $responsavei->bairro ?? '' }}
                            </td>
                            <td>
                                {{ $responsavei->celular ?? '' }}
                            </td>
                            <td>
                                @can('responsavei_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.responsaveis.show', $responsavei->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('responsavei_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.responsaveis.edit', $responsavei->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('responsavei_delete')
                                    <form action="{{ route('admin.responsaveis.destroy', $responsavei->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('responsavei_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.responsaveis.massDestroy') }}",
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
  let table = $('.datatable-Responsavei:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection