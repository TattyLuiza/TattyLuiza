@extends('layouts.admin')
@section('content')
@can('recado_professore_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.recado-professores.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.recadoProfessore.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.recadoProfessore.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RecadoProfessore">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.id_remetente') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.titulo') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.leu') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.lida_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadoProfessore.fields.id_destinatario') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recadoProfessores as $key => $recadoProfessore)
                        <tr data-entry-id="{{ $recadoProfessore->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $recadoProfessore->id ?? '' }}
                            </td>
                            <td>
                                @foreach($recadoProfessore->id_remetentes as $key => $item)
                                    <span class="badge badge-info">{{ $item->nome }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $recadoProfessore->titulo ?? '' }}
                            </td>
                            <td>
                                {{ $recadoProfessore->leu ?? '' }}
                            </td>
                            <td>
                                {{ $recadoProfessore->lida_at ?? '' }}
                            </td>
                            <td>
                                {{ $recadoProfessore->id_destinatario->nome ?? '' }}
                            </td>
                            <td>
                                @can('recado_professore_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.recado-professores.show', $recadoProfessore->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('recado_professore_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.recado-professores.edit', $recadoProfessore->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('recado_professore_delete')
                                    <form action="{{ route('admin.recado-professores.destroy', $recadoProfessore->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('recado_professore_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.recado-professores.massDestroy') }}",
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
  let table = $('.datatable-RecadoProfessore:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection