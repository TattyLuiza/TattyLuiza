@extends('layouts.admin')
@section('content')
@can('boleto_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.boletos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.boleto.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.boleto.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Boleto">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.banco') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.matricula') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.turma') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.movimento') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.parcela') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.valor') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.datadesconto') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.valordesconto') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.instrucoes') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.multa') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.vencimento') }}
                        </th>
                        <th>
                            {{ trans('cruds.boleto.fields.data') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boletos as $key => $boleto)
                        <tr data-entry-id="{{ $boleto->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $boleto->id ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->banco->conta ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->matricula->status ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->turma->tipo ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->movimento ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->parcela ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->valor ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->datadesconto ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->valordesconto ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->instrucoes ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->status ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->multa ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->vencimento ?? '' }}
                            </td>
                            <td>
                                {{ $boleto->data ?? '' }}
                            </td>
                            <td>
                                @can('boleto_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.boletos.show', $boleto->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('boleto_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.boletos.edit', $boleto->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('boleto_delete')
                                    <form action="{{ route('admin.boletos.destroy', $boleto->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('boleto_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.boletos.massDestroy') }}",
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
  let table = $('.datatable-Boleto:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection