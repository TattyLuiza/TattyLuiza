@extends('layouts.admin')
@section('content')
@can('horario_semanal_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.horario-semanals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.horarioSemanal.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.horarioSemanal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HorarioSemanal">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.ano') }}
                        </th>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.turma') }}
                        </th>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.professor') }}
                        </th>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.horario') }}
                        </th>
                        <th>
                            {{ trans('cruds.horario.fields.ini') }}
                        </th>
                        <th>
                            {{ trans('cruds.horarioSemanal.fields.disciplina') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($horarioSemanals as $key => $horarioSemanal)
                        <tr data-entry-id="{{ $horarioSemanal->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $horarioSemanal->id ?? '' }}
                            </td>
                            <td>
                                {{ $horarioSemanal->ano->ano ?? '' }}
                            </td>
                            <td>
                                {{ $horarioSemanal->turma->nome ?? '' }}
                            </td>
                            <td>
                                {{ $horarioSemanal->professor->nome ?? '' }}
                            </td>
                            <td>
                                {{ $horarioSemanal->horario->nome ?? '' }}
                            </td>
                            <td>
                                {{ $horarioSemanal->horario->ini ?? '' }}
                            </td>
                            <td>
                                {{ $horarioSemanal->disciplina->nome ?? '' }}
                            </td>
                            <td>
                                @can('horario_semanal_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.horario-semanals.show', $horarioSemanal->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('horario_semanal_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.horario-semanals.edit', $horarioSemanal->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('horario_semanal_delete')
                                    <form action="{{ route('admin.horario-semanals.destroy', $horarioSemanal->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('horario_semanal_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.horario-semanals.massDestroy') }}",
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
  let table = $('.datatable-HorarioSemanal:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection