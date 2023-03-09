<div class="m-3">
    @can('planos_aula_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.planos-aulas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.planosAula.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.planosAula.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-turmaPlanosAulas">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.horario') }}
                            </th>
                            <th>
                                {{ trans('cruds.horario.fields.ini') }}
                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.disciplina') }}
                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.turma') }}
                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.professor') }}
                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.dia_letivo') }}
                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.bimestre') }}
                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.carga_horaria') }}
                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.apostila') }}
                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.capitulo') }}
                            </th>
                            <th>
                                {{ trans('cruds.planosAula.fields.atividade') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($planosAulas as $key => $planosAula)
                            <tr data-entry-id="{{ $planosAula->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $planosAula->id ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->horario->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->horario->ini ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->disciplina->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->turma->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->professor->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->dia_letivo->data ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->bimestre ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->carga_horaria ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->apostila ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->capitulo ?? '' }}
                                </td>
                                <td>
                                    {{ $planosAula->atividade ?? '' }}
                                </td>
                                <td>
                                    @can('planos_aula_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.planos-aulas.show', $planosAula->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('planos_aula_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.planos-aulas.edit', $planosAula->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('planos_aula_delete')
                                        <form action="{{ route('admin.planos-aulas.destroy', $planosAula->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('planos_aula_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.planos-aulas.massDestroy') }}",
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
  let table = $('.datatable-turmaPlanosAulas:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection