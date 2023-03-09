<div class="m-3">

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.seriesMaterium.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-materiaSeriesMateria">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.seriesMaterium.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.seriesMaterium.fields.materia') }}
                            </th>
                            <th>
                                {{ trans('cruds.materium.fields.abreviado') }}
                            </th>
                            <th>
                                {{ trans('cruds.seriesMaterium.fields.serie') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seriesMateria as $key => $seriesMaterium)
                            <tr data-entry-id="{{ $seriesMaterium->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $seriesMaterium->id ?? '' }}
                                </td>
                                <td>
                                    {{ $seriesMaterium->materia->nome ?? '' }}
                                </td>
                                <td>
                                    {{ $seriesMaterium->materia->abreviado ?? '' }}
                                </td>
                                <td>
                                    {{ $seriesMaterium->serie->nome ?? '' }}
                                </td>
                                <td>



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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-materiaSeriesMateria:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection