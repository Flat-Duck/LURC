@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.operation.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.operations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.operation.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $operation->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.operation.fields.service') }}
                                    </th>
                                    <td>
                                        {{ $operation->service->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.operation.fields.doctor') }}
                                    </th>
                                    <td>
                                        {{ $operation->doctor->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.operation.fields.patient') }}
                                    </th>
                                    <td>
                                        {{ $operation->patient->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.operation.fields.lab') }}
                                    </th>
                                    <td>
                                        {{ $operation->lab }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.operation.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $operation->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.operation.fields.notes') }}
                                    </th>
                                    <td>
                                        {{ $operation->notes }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.operations.index') }}">
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