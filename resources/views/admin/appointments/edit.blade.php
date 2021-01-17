@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.appointment.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.appointments.update", [$appointment->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('doctor') ? 'has-error' : '' }}">
                            <label for="doctor_id">{{ trans('cruds.appointment.fields.doctor') }}</label>
                            <select class="form-control select2" name="doctor_id" id="doctor_id">
                                @foreach($doctors as $id => $doctor)
                                    <option value="{{ $id }}" {{ (old('doctor_id') ? old('doctor_id') : $appointment->doctor->id ?? '') == $id ? 'selected' : '' }}>{{ $doctor }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('doctor'))
                                <span class="help-block" role="alert">{{ $errors->first('doctor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.appointment.fields.doctor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('patient') ? 'has-error' : '' }}">
                            <label for="patient_id">{{ trans('cruds.appointment.fields.patient') }}</label>
                            <select class="form-control select2" name="patient_id" id="patient_id">
                                @foreach($patients as $id => $patient)
                                    <option value="{{ $id }}" {{ (old('patient_id') ? old('patient_id') : $appointment->patient->id ?? '') == $id ? 'selected' : '' }}>{{ $patient }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('patient'))
                                <span class="help-block" role="alert">{{ $errors->first('patient') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.appointment.fields.patient_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">{{ trans('cruds.appointment.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $appointment->date) }}">
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.appointment.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('time') ? 'has-error' : '' }}">
                            <label for="time">{{ trans('cruds.appointment.fields.time') }}</label>
                            <input class="form-control timepicker" type="text" name="time" id="time" value="{{ old('time', $appointment->time) }}">
                            @if($errors->has('time'))
                                <span class="help-block" role="alert">{{ $errors->first('time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.appointment.fields.time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection