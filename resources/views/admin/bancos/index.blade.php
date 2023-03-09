@extends('layouts.admin')
@section('content')
@can('banco_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.bancos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.banco.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.banco.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Banco">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.beneficiario') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.cnpj') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.banco') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.taxa') }}
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
                            {{ trans('cruds.banco.fields.cedente') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.cedente_dv') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.carteira') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.arquivo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bancos as $key => $banco)
                        <tr data-entry-id="{{ $banco->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $banco->id ?? '' }}
                            </td>
                            <td>
                                {{ $banco->nome ?? '' }}
                            </td>
                            <td>
                                {{ $banco->beneficiario ?? '' }}
                            </td>
                            <td>
                                {{ $banco->cnpj ?? '' }}
                            </td>
                            <td>
                                {{ $banco->banco ?? '' }}
                            </td>
                            <td>
                                {{ $banco->taxa ?? '' }}
                            </td>
                            <td>
                                {{ $banco->agencia ?? '' }}
                            </td>
                            <td>
                                {{ $banco->agencia_dv ?? '' }}
                            </td>
                            <td>
                                {{ $banco->conta ?? '' }}
                            </td>
                            <td>
                                {{ $banco->conta_dv ?? '' }}
                            </td>
                            <td>
                                {{ $banco->cedente ?? '' }}
                            </td>
                            <td>
                                {{ $banco->cedente_dv ?? '' }}
                            </td>
                            <td>
                                {{ $banco->carteira ?? '' }}
                            </td>
                            <td>
                                {{ $banco->arquivo ?? '' }}
                            </td>
                            <td>
                                @can('banco_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.bancos.show', $banco->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('banco_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.bancos.edit', $banco->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('banco_delete')
                                    <form action="{{ route('admin.bancos.destroy', $banco->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('banco_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bancos.massDestroy') }}",
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
  let table = $('.datatable-Banco:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection