@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.prescription.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.prescriptions.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">{{ trans('cruds.prescription.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}">
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.prescription.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('doctor') ? 'has-error' : '' }}">
                            <label for="doctor_id">{{ trans('cruds.prescription.fields.doctor') }}</label>
                            <select class="form-control select2" name="doctor_id" id="doctor_id">
                                @foreach($doctors as $id => $doctor)
                                    <option value="{{ $id }}" {{ old('doctor_id') == $id ? 'selected' : '' }}>{{ $doctor }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('doctor'))
                                <span class="help-block" role="alert">{{ $errors->first('doctor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.prescription.fields.doctor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('patient') ? 'has-error' : '' }}">
                            <label for="patient_id">{{ trans('cruds.prescription.fields.patient') }}</label>
                            <select class="form-control select2" name="patient_id" id="patient_id">
                                @foreach($patients as $id => $patient)
                                    <option value="{{ $id }}" {{ old('patient_id') == $id ? 'selected' : '' }}>{{ $patient }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('patient'))
                                <span class="help-block" role="alert">{{ $errors->first('patient') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.prescription.fields.patient_helper') }}</span>
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
