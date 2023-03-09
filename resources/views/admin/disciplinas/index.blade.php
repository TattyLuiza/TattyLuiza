@extends('layouts.admin')
@section('content')
@can('disciplina_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.disciplinas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.disciplina.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.disciplina.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Disciplina">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.disciplina.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.disciplina.fields.nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.disciplina.fields.tipo') }}
                        </th>
                        <th>
                            {{ trans('cruds.disciplina.fields.livros') }}
                        </th>
                        <th>
                            {{ trans('cruds.disciplina.fields.tipo_2') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($disciplinas as $key => $disciplina)
                        <tr data-entry-id="{{ $disciplina->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $disciplina->id ?? '' }}
                            </td>
                            <td>
                                {{ $disciplina->nome ?? '' }}
                            </td>
                            <td>
                                {{ $disciplina->tipo ?? '' }}
                            </td>
                            <td>
                                {{ $disciplina->livros ?? '' }}
                            </td>
                            <td>
                                {{ $disciplina->tipo_2 ?? '' }}
                            </td>
                            <td>
                                @can('disciplina_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.disciplinas.show', $disciplina->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('disciplina_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.disciplinas.edit', $disciplina->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('disciplina_delete')
                                    <form action="{{ route('admin.disciplinas.destroy', $disciplina->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('disciplina_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.disciplinas.massDestroy') }}",
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
  let table = $('.datatable-Disciplina:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection