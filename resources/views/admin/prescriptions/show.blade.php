@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.prescription.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.prescriptions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prescription.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $prescription->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prescription.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $prescription->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prescription.fields.doctor') }}
                                    </th>
                                    <td>
                                        {{ $prescription->doctor->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.prescription.fields.patient') }}
                                    </th>
                                    <td>
                                        {{ $prescription->patient->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.prescriptions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#prescription_entries" aria-controls="prescription_entries" role="tab" data-toggle="tab">
                            {{ trans('cruds.entry.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="prescription_entries">
                        @includeIf('admin.prescriptions.relationships.prescriptionEntries', ['entries' => $prescription->prescriptionEntries])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection