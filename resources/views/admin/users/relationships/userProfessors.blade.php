<div class="m-3">
    @can('professor_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.professors.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.professor.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.professor.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-userProfessors">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.professor.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.professor.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.professor.fields.cargo') }}
                            </th>
                            <th>
                                {{ trans('cruds.professor.fields.admissao') }}
                            </th>
                            <th>
                                {{ trans('cruds.professor.fields.cpf') }}
                            </th>
                            <th>
                                {{ trans('cruds.professor.fields.rg') }}
                            </th>
                            <th>
                                {{ trans('cruds.professor.fields.nome') }}
                            </th>
                            <th>
                                {{ trans('cruds.professor.fields.telefone') }}
                            </th>
                            <th>
                                {{ trans('cruds.professor.fields.celular') }}
                            </th>
                            <th>
                                {{ trans('cruds.professor.fields.email') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($professors as $key => $professor)
                            <tr data-entry-id="{{ $professor->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $professor->id ?? '' }}
                                </td>
                                <td>
                                    {{ $professor->status ?? '' }}
                                </td>
                                <td>
                                    {{ $professor->cargo ?? '' }}
                                </td>
                                <td>
                                    {{ $professor->admissao ?? '' }}
                                </td>
                                <td>
                                    {{ $professor->cpf ?? '' }}
                                </td>
                                <td>
                                    {{ $professor->rg ?? '' }}
                                </td>
                                <td>
                                    {{ $professor->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $professor->telefone ?? '' }}
                                </td>
                                <td>
                                    {{ $professor->celular ?? '' }}
                                </td>
                                <td>
                                    {{ $professor->email ?? '' }}
                                </td>
                                <td>
                                    @can('professor_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.professors.show', $professor->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('professor_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.professors.edit', $professor->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('professor_delete')
                                        <form action="{{ route('admin.professors.destroy', $professor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('professor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.professors.massDestroy') }}",
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
  let table = $('.datatable-userProfessors:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection