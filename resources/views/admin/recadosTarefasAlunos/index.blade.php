@extends('layouts.admin')
@section('content')
@can('recados_tarefas_aluno_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.recados-tarefas-alunos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.recadosTarefasAluno.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.recadosTarefasAluno.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RecadosTarefasAluno">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.id_recado_tarefa_professor') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.id_professor') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.id_aluno') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.titulo') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.tipo') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.modo') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.leu') }}
                        </th>
                        <th>
                            {{ trans('cruds.recadosTarefasAluno.fields.agendamento') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recadosTarefasAlunos as $key => $recadosTarefasAluno)
                        <tr data-entry-id="{{ $recadosTarefasAluno->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $recadosTarefasAluno->id ?? '' }}
                            </td>
                            <td>
                                {{ $recadosTarefasAluno->id_recado_tarefa_professor->nome ?? '' }}
                            </td>
                            <td>
                                {{ $recadosTarefasAluno->id_professor->nome ?? '' }}
                            </td>
                            <td>
                                @foreach($recadosTarefasAluno->id_alunos as $key => $item)
                                    <span class="badge badge-info">{{ $item->nome }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $recadosTarefasAluno->titulo ?? '' }}
                            </td>
                            <td>
                                {{ $recadosTarefasAluno->tipo ?? '' }}
                            </td>
                            <td>
                                {{ $recadosTarefasAluno->modo ?? '' }}
                            </td>
                            <td>
                                {{ $recadosTarefasAluno->leu ?? '' }}
                            </td>
                            <td>
                                {{ $recadosTarefasAluno->agendamento ?? '' }}
                            </td>
                            <td>
                                @can('recados_tarefas_aluno_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.recados-tarefas-alunos.show', $recadosTarefasAluno->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('recados_tarefas_aluno_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.recados-tarefas-alunos.edit', $recadosTarefasAluno->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('recados_tarefas_aluno_delete')
                                    <form action="{{ route('admin.recados-tarefas-alunos.destroy', $recadosTarefasAluno->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('recados_tarefas_aluno_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.recados-tarefas-alunos.massDestroy') }}",
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
  let table = $('.datatable-RecadosTarefasAluno:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection