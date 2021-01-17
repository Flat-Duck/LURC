@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.entry.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.entries.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('medicine') ? 'has-error' : '' }}">
                            <label for="medicine_id">{{ trans('cruds.entry.fields.medicine') }}</label>
                            <select class="form-control select2" name="medicine_id" id="medicine_id">
                                @foreach($medicines as $id => $medicine)
                                    <option value="{{ $id }}" {{ old('medicine_id') == $id ? 'selected' : '' }}>{{ $medicine }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('medicine'))
                                <span class="help-block" role="alert">{{ $errors->first('medicine') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entry.fields.medicine_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('prescription') ? 'has-error' : '' }}">
                            <label for="prescription_id">{{ trans('cruds.entry.fields.prescription') }}</label>
                            <select class="form-control select2" name="prescription_id" id="prescription_id">
                                @foreach($prescriptions as $id => $prescription)
                                    <option value="{{ $id }}" {{ old('prescription_id') == $id ? 'selected' : '' }}>{{ $prescription }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('prescription'))
                                <span class="help-block" role="alert">{{ $errors->first('prescription') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entry.fields.prescription_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rx') ? 'has-error' : '' }}">
                            <label for="rx">{{ trans('cruds.entry.fields.rx') }}</label>
                            <input class="form-control" type="text" name="rx" id="rx" value="{{ old('rx', '') }}">
                            @if($errors->has('rx'))
                                <span class="help-block" role="alert">{{ $errors->first('rx') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entry.fields.rx_helper') }}</span>
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