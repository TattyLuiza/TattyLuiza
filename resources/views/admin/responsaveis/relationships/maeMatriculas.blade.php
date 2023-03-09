<div class="m-3">
    @can('matricula_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.matriculas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.matricula.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.matricula.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-maeMatriculas">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.ano') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.aluno') }}
                            </th>
                            <th>
                                {{ trans('cruds.aluno.fields.cpf') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.mae') }}
                            </th>
                            <th>
                                {{ trans('cruds.responsavei.fields.cpf') }}
                            </th>
                            <th>
                                {{ trans('cruds.responsavei.fields.telefone') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.pai') }}
                            </th>
                            <th>
                                {{ trans('cruds.responsavei.fields.cpf') }}
                            </th>
                            <th>
                                {{ trans('cruds.responsavei.fields.telefone') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.turno') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.turma') }}
                            </th>
                            <th>
                                {{ trans('cruds.turma.fields.turno') }}
                            </th>
                            <th>
                                {{ trans('cruds.turma.fields.valor') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.valor') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.desconto') }}
                            </th>
                            <th>
                                {{ trans('cruds.matricula.fields.total') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matriculas as $key => $matricula)
                            <tr data-entry-id="{{ $matricula->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $matricula->id ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->ano->ano ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->status ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->aluno->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->aluno->cpf ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->mae->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->mae->cpf ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->mae->telefone ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->pai->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->pai->cpf ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->pai->telefone ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->turno ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->turma->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->turma->turno ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->turma->valor ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->valor ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->desconto ?? '' }}
                                </td>
                                <td>
                                    {{ $matricula->total ?? '' }}
                                </td>
                                <td>
                                    @can('matricula_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.matriculas.show', $matricula->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('matricula_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.matriculas.edit', $matricula->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('matricula_delete')
                                        <form action="{{ route('admin.matriculas.destroy', $matricula->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('matricula_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.matriculas.massDestroy') }}",
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
  let table = $('.datatable-maeMatriculas:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection