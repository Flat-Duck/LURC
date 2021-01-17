@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.appointment.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.appointments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $appointment->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.doctor') }}
                                    </th>
                                    <td>
                                        {{ $appointment->doctor->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.patient') }}
                                    </th>
                                    <td>
                                        {{ $appointment->patient->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $appointment->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.appointment.fields.time') }}
                                    </th>
                                    <td>
                                        {{ $appointment->time }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.appointments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection