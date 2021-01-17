@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.expense.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.expenses.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('material') ? 'has-error' : '' }}">
                            <label for="material_id">{{ trans('cruds.expense.fields.material') }}</label>
                            <select class="form-control select2" name="material_id" id="material_id">
                                @foreach($materials as $id => $material)
                                    <option value="{{ $id }}" {{ old('material_id') == $id ? 'selected' : '' }}>{{ $material }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('material'))
                                <span class="help-block" role="alert">{{ $errors->first('material') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.material_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="price">{{ trans('cruds.expense.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '0') }}" step="0.01">
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : '' }}">
                            <label for="invoice_number">{{ trans('cruds.expense.fields.invoice_number') }}</label>
                            <input class="form-control" type="text" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', '') }}">
                            @if($errors->has('invoice_number'))
                                <span class="help-block" role="alert">{{ $errors->first('invoice_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.invoice_number_helper') }}</span>
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