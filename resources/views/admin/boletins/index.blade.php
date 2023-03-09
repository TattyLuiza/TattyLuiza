@extends('layouts.admin')
@section('content')
@can('boletin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.boletins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.boletin.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.boletin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Boletin">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.aluno') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.matricula') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.professor') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.turma') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.disciplina') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.t_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.n_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.f_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.t_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.n_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.f_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.t_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.n_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.f_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.t_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.n_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.f_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.r_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.r_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.r_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.r_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.tr') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.tr_nota') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.t_falta') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.recuperacao') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.resultado') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.aluno_nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.turma_nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.materia_nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.abreviado_nome') }}
                        </th>
                        <th>
                            {{ trans('cruds.boletin.fields.professor_nome') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boletins as $key => $boletin)
                        <tr data-entry-id="{{ $boletin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $boletin->id ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->aluno->nome ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->matricula->status ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->professor->nome ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->turma->nome ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->disciplina->nome ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->t_1 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->n_1 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->f_1 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->t_2 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->n_2 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->f_2 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->t_3 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->n_3 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->f_3 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->t_4 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->n_4 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->f_4 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->r_1 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->r_2 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->r_3 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->r_4 ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->tr ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->tr_nota ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->t_falta ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->recuperacao ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->resultado ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->aluno_nome ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->turma_nome ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->materia_nome ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->abreviado_nome ?? '' }}
                            </td>
                            <td>
                                {{ $boletin->professor_nome ?? '' }}
                            </td>
                            <td>
                                @can('boletin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.boletins.show', $boletin->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('boletin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.boletins.edit', $boletin->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('boletin_delete')
                                    <form action="{{ route('admin.boletins.destroy', $boletin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('boletin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.boletins.massDestroy') }}",
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
  let table = $('.datatable-Boletin:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection