@extends('layouts.admin')
@section('content')
<div class="content">
    @can('doctor_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.doctors.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.doctor.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.doctor.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Doctor">
                            <thead>
                                <tr>
                                    {{-- <th width="10">

                                    </th>
                                    --}}
                                    <th>
                                       #
                                    </th> 
                                    <th>
                                        {{ trans('cruds.doctor.fields.name') }}
                                    </th>
                                    {{-- <th>
                                        {{ trans('cruds.doctor.fields.gender') }}
                                    </th> --}}
                                    <th>
                                        {{ trans('cruds.doctor.fields.picture') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.doctor.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.doctor.fields.email') }}
                                    </th>
                                    {{-- <th>
                                        {{ trans('cruds.doctor.fields.birth_date') }}
                                    </th> --}}
                                    <th>
                                        {{ trans('cruds.doctor.fields.percentage') }}
                                    </th>
                                    {{-- <th>
                                        {{ trans('cruds.doctor.fields.specialty') }}
                                    </th> --}}
                                    <th>
                                       العمليات
                                    </th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach($doctors as $key => $doctor)
                                    <tr data-entry-id="{{ $doctor->id }}">
                                        {{-- <td>

                                        </td> --}}
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $doctor->name ?? '' }}
                                        </td>
                                        {{-- <td>
                                            {{ App\Models\Doctor::GENDER_SELECT[$doctor->gender] ?? '' }}
                                        </td> --}}
                                        <td>
                                            @if($doctor->picture)
                                                <a href="{{ $doctor->picture->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $doctor->picture->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $doctor->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $doctor->email ?? '' }}
                                        </td>
                                        {{-- <td>
                                            {{ $doctor->birth_date ?? '' }}
                                        </td> --}}
                                        <td>
                                            {{ $doctor->percentage ?? '' }}
                                        </td>
                                        {{-- <td>
                                            {{ $doctor->specialty ?? '' }}
                                        </td> --}}
                                        <td>
                                            @can('doctor_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.doctors.show', $doctor->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('doctor_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.doctors.edit', $doctor->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('doctor_delete')
                                                <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('doctor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.doctors.massDestroy') }}",
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
    // order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Doctor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection