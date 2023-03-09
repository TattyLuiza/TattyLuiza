@extends('layouts.admin')
@section('content')
@can('diarios_aluno_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.diarios-alunos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.diariosAluno.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.diariosAluno.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DiariosAluno">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.diario') }}
                        </th>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.matricula') }}
                        </th>
                        <th>
                            {{ trans('cruds.matricula.fields.aluno_nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.presenca') }}
                        </th>
                        <th>
                            {{ trans('cruds.diariosAluno.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diariosAlunos as $key => $diariosAluno)
                        <tr data-entry-id="{{ $diariosAluno->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $diariosAluno->id ?? '' }}
                            </td>
                            <td>
                                {{ $diariosAluno->diario->status ?? '' }}
                            </td>
                            <td>
                                {{ $diariosAluno->matricula->status ?? '' }}
                            </td>
                            <td>
                                {{ $diariosAluno->matricula->aluno_nome ?? '' }}
                            </td>
                            <td>
                                {{ $diariosAluno->presenca ?? '' }}
                            </td>
                            <td>
                                {{ $diariosAluno->status ?? '' }}
                            </td>
                            <td>
                                @can('diarios_aluno_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.diarios-alunos.show', $diariosAluno->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('diarios_aluno_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.diarios-alunos.edit', $diariosAluno->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('diarios_aluno_delete')
                                    <form action="{{ route('admin.diarios-alunos.destroy', $diariosAluno->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('diarios_aluno_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.diarios-alunos.massDestroy') }}",
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
  let table = $('.datatable-DiariosAluno:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection