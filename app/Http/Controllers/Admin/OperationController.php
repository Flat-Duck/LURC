<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOperationRequest;
use App\Http\Requests\StoreOperationRequest;
use App\Http\Requests\UpdateOperationRequest;
use App\Models\Doctor;
use App\Models\Operation;
use App\Models\Patient;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OperationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('operation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operations = Operation::with(['service', 'doctor', 'patient'])->get();

        $services = Service::get();

        $doctors = Doctor::get();

        $patients = Patient::get();

        return view('admin.operations.index', compact('operations', 'services', 'doctors', 'patients'));
    }

    public function create()
    {
        abort_if(Gate::denies('operation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctors = Doctor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $patients = Patient::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.operations.create', compact('services', 'doctors', 'patients'));
    }

    public function store(StoreOperationRequest $request)
    {
        $operation = Operation::create($request->all());

        return redirect()->route('admin.operations.index');
    }

    public function edit(Operation $operation)
    {
        abort_if(Gate::denies('operation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctors = Doctor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $patients = Patient::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $operation->load('service', 'doctor', 'patient');

        return view('admin.operations.edit', compact('services', 'doctors', 'patients', 'operation'));
    }

    public function update(UpdateOperationRequest $request, Operation $operation)
    {
        $operation->update($request->all());

        return redirect()->route('admin.operations.index');
    }

    public function show(Operation $operation)
    {
        abort_if(Gate::denies('operation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operation->load('service', 'doctor', 'patient');

        return view('admin.operations.show', compact('operation'));
    }

    public function destroy(Operation $operation)
    {
        abort_if(Gate::denies('operation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operation->delete();

        return back();
    }

    public function massDestroy(MassDestroyOperationRequest $request)
    {
        Operation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}