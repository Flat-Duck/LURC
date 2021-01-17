@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.employee.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.employees.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.employee.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.employee.fields.gender') }}</label>
                            @foreach(App\Models\Employee::GENDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }}>
                                    <label for="gender_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('gender'))
                                <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('cruds.employee.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('job') ? 'has-error' : '' }}">
                            <label for="job">{{ trans('cruds.employee.fields.job') }}</label>
                            <input class="form-control" type="text" name="job" id="job" value="{{ old('job', '') }}">
                            @if($errors->has('job'))
                                <span class="help-block" role="alert">{{ $errors->first('job') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.job_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
                            <label for="salary">{{ trans('cruds.employee.fields.salary') }}</label>
                            <input class="form-control" type="number" name="salary" id="salary" value="{{ old('salary', '') }}" step="0.01">
                            @if($errors->has('salary'))
                                <span class="help-block" role="alert">{{ $errors->first('salary') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.salary_helper') }}</span>
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