@extends('layouts.admin')
@section('content')
<div class="content">
    @can('patient_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.patients.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.patient.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.patient.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Patient">
                            <thead>
                                <tr>
                                    <th width="10">
                                        #
                                    </th>
                                    {{-- <th>
                                        {{ trans('cruds.patient.fields.id') }}
                                    </th> --}}
                                    <th>
                                        {{ trans('cruds.patient.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.patient.fields.gender') }}
                                    </th>
                                    {{-- <th>
                                        {{ trans('cruds.patient.fields.picture') }}
                                    </th> --}}
                                    <th>
                                        {{ trans('cruds.patient.fields.phone') }}
                                    </th>
                                    {{-- <th>
                                        {{ trans('cruds.patient.fields.email') }}
                                    </th> --}}
                                    <th>
                                        {{ trans('cruds.patient.fields.birth_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.patient.fields.blood_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.patient.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.patient.fields.payment') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.patient.fields.debt') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.patient.fields.payed') }}
                                    </th>
                                    <th>
                                        العمليات
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $key => $patient)
                                    <tr data-entry-id="{{ $patient->id }}">
                                        <td>
                                            {{ $key+1 }}

                                        </td>
                                        {{-- <td>
                                            {{ $patient->id ?? '' }}
                                        </td> --}}
                                        <td>
                                            {{ $patient->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Patient::GENDER_SELECT[$patient->gender] ?? '' }}
                                        </td>
                                        {{-- <td>
                                            @if($patient->picture)
                                                <a href="{{ $patient->picture->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $patient->picture->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td> --}}
                                        <td>
                                            {{ $patient->phone ?? '' }}
                                        </td>
                                        {{-- <td>
                                            {{ $patient->email ?? '' }}
                                        </td> --}}
                                        <td>
                                            {{ $patient->birth_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $patient->blood_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Patient::STATUS_SELECT[$patient->status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Patient::PAYMENT_SELECT[$patient->payment] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $patient->debt ?? '' }}
                                        </td>
                                        <td>
                                            {{ $patient->payed ?? '' }}
                                        </td>
                                        <td>
                                            @can('patient_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.patients.show', $patient->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('patient_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.patients.edit', $patient->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('patient_delete')
                                                <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('patient_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.patients.massDestroy') }}",
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
  let table = $('.datatable-Patient:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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