@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.operation.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.operations.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('service') ? 'has-error' : '' }}">
                            <label for="service_id">{{ trans('cruds.operation.fields.service') }}</label>
                            <select class="form-control select2" name="service_id" id="service_id">
                                @foreach($services as $id => $service)
                                    <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>{{ $service }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('service'))
                                <span class="help-block" role="alert">{{ $errors->first('service') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.service_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('doctor') ? 'has-error' : '' }}">
                            <label for="doctor_id">{{ trans('cruds.operation.fields.doctor') }}</label>
                            <select class="form-control select2" name="doctor_id" id="doctor_id">
                                @foreach($doctors as $id => $doctor)
                                    <option value="{{ $id }}" {{ old('doctor_id') == $id ? 'selected' : '' }}>{{ $doctor }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('doctor'))
                                <span class="help-block" role="alert">{{ $errors->first('doctor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.doctor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('patient') ? 'has-error' : '' }}">
                            <label for="patient_id">{{ trans('cruds.operation.fields.patient') }}</label>
                            <select class="form-control select2" name="patient_id" id="patient_id">
                                @foreach($patients as $id => $patient)
                                    <option value="{{ $id }}" {{ old('patient_id') == $id ? 'selected' : '' }}>{{ $patient }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('patient'))
                                <span class="help-block" role="alert">{{ $errors->first('patient') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.patient_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lab') ? 'has-error' : '' }}">
                            <label for="lab">{{ trans('cruds.operation.fields.lab') }}</label>
                            <input class="form-control" type="number" name="lab" id="lab" value="{{ old('lab', '0') }}" step="0.01">
                            @if($errors->has('lab'))
                                <span class="help-block" role="alert">{{ $errors->first('lab') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.lab_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="price">{{ trans('cruds.operation.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '0') }}" step="0.01">
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                            <label for="notes">{{ trans('cruds.operation.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes') }}</textarea>
                            @if($errors->has('notes'))
                                <span class="help-block" role="alert">{{ $errors->first('notes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.notes_helper') }}</span>
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