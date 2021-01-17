@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.patient.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.patients.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $patient->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $patient->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Patient::GENDER_SELECT[$patient->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.picture') }}
                                    </th>
                                    <td>
                                        @if($patient->picture)
                                            <a href="{{ $patient->picture->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $patient->picture->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $patient->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $patient->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.birth_date') }}
                                    </th>
                                    <td>
                                        {{ $patient->birth_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.notes') }}
                                    </th>
                                    <td>
                                        {!! $patient->notes !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.blood_type') }}
                                    </th>
                                    <td>
                                        {{ $patient->blood_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Patient::STATUS_SELECT[$patient->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.payment') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Patient::PAYMENT_SELECT[$patient->payment] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.debt') }}
                                    </th>
                                    <td>
                                        {{ $patient->debt }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.patient.fields.payed') }}
                                    </th>
                                    <td>
                                        {{ $patient->payed }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.patients.index') }}">
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
                        <a href="#patient_appointments" aria-controls="patient_appointments" role="tab" data-toggle="tab">
                            {{ trans('cruds.appointment.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#patient_operations" aria-controls="patient_operations" role="tab" data-toggle="tab">
                            {{ trans('cruds.operation.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#patient_prescriptions" aria-controls="patient_prescriptions" role="tab" data-toggle="tab">
                            {{ trans('cruds.prescription.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="patient_appointments">
                        @includeIf('admin.patients.relationships.patientAppointments', ['appointments' => $patient->patientAppointments])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="patient_operations">
                        @includeIf('admin.patients.relationships.patientOperations', ['operations' => $patient->patientOperations])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="patient_prescriptions">
                        @includeIf('admin.patients.relationships.patientPrescriptions', ['prescriptions' => $patient->patientPrescriptions])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection