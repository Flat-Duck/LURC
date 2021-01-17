@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.doctor.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.doctors.update", [$doctor->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.doctor.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $doctor->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.doctor.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.doctor.fields.gender') }}</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Doctor::GENDER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('gender', $doctor->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))
                                <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.doctor.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                            <label for="picture">{{ trans('cruds.doctor.fields.picture') }}</label>
                            <div class="needsclick dropzone" id="picture-dropzone">
                            </div>
                            @if($errors->has('picture'))
                                <span class="help-block" role="alert">{{ $errors->first('picture') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.doctor.fields.picture_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('cruds.doctor.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $doctor->phone) }}">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.doctor.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.doctor.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $doctor->email) }}">
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.doctor.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('birth_date') ? 'has-error' : '' }}">
                            <label for="birth_date">{{ trans('cruds.doctor.fields.birth_date') }}</label>
                            <input class="form-control date" type="text" name="birth_date" id="birth_date" value="{{ old('birth_date', $doctor->birth_date) }}">
                            @if($errors->has('birth_date'))
                                <span class="help-block" role="alert">{{ $errors->first('birth_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.doctor.fields.birth_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('percentage') ? 'has-error' : '' }}">
                            <label for="percentage">{{ trans('cruds.doctor.fields.percentage') }}</label>
                            <input class="form-control" type="number" name="percentage" id="percentage" value="{{ old('percentage', $doctor->percentage) }}" step="0.01">
                            @if($errors->has('percentage'))
                                <span class="help-block" role="alert">{{ $errors->first('percentage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.doctor.fields.percentage_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('specialty') ? 'has-error' : '' }}">
                            <label for="specialty">{{ trans('cruds.doctor.fields.specialty') }}</label>
                            <input class="form-control" type="text" name="specialty" id="specialty" value="{{ old('specialty', $doctor->specialty) }}">
                            @if($errors->has('specialty'))
                                <span class="help-block" role="alert">{{ $errors->first('specialty') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.doctor.fields.specialty_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.pictureDropzone = {
    url: '{{ route('admin.doctors.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="picture"]').remove()
      $('form').append('<input type="hidden" name="picture" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="picture"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($doctor) && $doctor->picture)
      var file = {!! json_encode($doctor->picture) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="picture" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection