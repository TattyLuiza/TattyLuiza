<div class="m-3">
    @can('aluno_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.alunos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.aluno.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.aluno.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-maeAlunos">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.aluno.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.aluno.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.aluno.fields.nome') }}
                            </th>
                            <th>
                                {{ trans('cruds.aluno.fields.nascimento') }}
                            </th>
                            <th>
                                {{ trans('cruds.aluno.fields.cpf') }}
                            </th>
                            <th>
                                {{ trans('cruds.aluno.fields.rg') }}
                            </th>
                            <th>
                                {{ trans('cruds.aluno.fields.telefone') }}
                            </th>
                            <th>
                                {{ trans('cruds.aluno.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.aluno.fields.diavencimento') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alunos as $key => $aluno)
                            <tr data-entry-id="{{ $aluno->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $aluno->id ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Aluno::STATUS_SELECT[$aluno->status] ?? '' }}
                                </td>
                                <td>
                                    {{ $aluno->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $aluno->nascimento ?? '' }}
                                </td>
                                <td>
                                    {{ $aluno->cpf ?? '' }}
                                </td>
                                <td>
                                    {{ $aluno->rg ?? '' }}
                                </td>
                                <td>
                                    {{ $aluno->telefone ?? '' }}
                                </td>
                                <td>
                                    {{ $aluno->email ?? '' }}
                                </td>
                                <td>
                                    {{ $aluno->diavencimento ?? '' }}
                                </td>
                                <td>
                                    @can('aluno_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.alunos.show', $aluno->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('aluno_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.alunos.edit', $aluno->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('aluno_delete')
                                        <form action="{{ route('admin.alunos.destroy', $aluno->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('aluno_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.alunos.massDestroy') }}",
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
  let table = $('.datatable-maeAlunos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection