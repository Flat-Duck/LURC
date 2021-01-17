@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.doctor.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.doctors.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.doctor.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $doctor->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.doctor.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $doctor->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.doctor.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Doctor::GENDER_SELECT[$doctor->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.doctor.fields.picture') }}
                                    </th>
                                    <td>
                                        @if($doctor->picture)
                                            <a href="{{ $doctor->picture->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $doctor->picture->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.doctor.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $doctor->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.doctor.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $doctor->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.doctor.fields.birth_date') }}
                                    </th>
                                    <td>
                                        {{ $doctor->birth_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.doctor.fields.percentage') }}
                                    </th>
                                    <td>
                                        {{ $doctor->percentage }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.doctor.fields.specialty') }}
                                    </th>
                                    <td>
                                        {{ $doctor->specialty }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.doctors.index') }}">
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
                        <a href="#doctor_appointments" aria-controls="doctor_appointments" role="tab" data-toggle="tab">
                            {{ trans('cruds.appointment.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#doctor_operations" aria-controls="doctor_operations" role="tab" data-toggle="tab">
                            {{ trans('cruds.operation.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#doctor_prescriptions" aria-controls="doctor_prescriptions" role="tab" data-toggle="tab">
                            {{ trans('cruds.prescription.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="doctor_appointments">
                        @includeIf('admin.doctors.relationships.doctorAppointments', ['appointments' => $doctor->doctorAppointments])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="doctor_operations">
                        @includeIf('admin.doctors.relationships.doctorOperations', ['operations' => $doctor->doctorOperations])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="doctor_prescriptions">
                        @includeIf('admin.doctors.relationships.doctorPrescriptions', ['prescriptions' => $doctor->doctorPrescriptions])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection