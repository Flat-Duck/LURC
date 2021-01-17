<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEntryRequest;
use App\Http\Requests\StoreEntryRequest;
use App\Http\Requests\UpdateEntryRequest;
use App\Models\Entry;
use App\Models\Medicine;
use App\Models\Prescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('entry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entries = Entry::with(['medicine', 'prescription'])->get();

        return view('admin.entries.index', compact('entries'));
    }

    public function create()
    {
        abort_if(Gate::denies('entry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicines = Medicine::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prescriptions = Prescription::all()->pluck('date', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.entries.create', compact('medicines', 'prescriptions'));
    }

    public function store(StoreEntryRequest $request)
    {
        $entry = Entry::create($request->all());

        return redirect()->route('admin.entries.index');
    }

    public function edit(Entry $entry)
    {
        abort_if(Gate::denies('entry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicines = Medicine::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prescriptions = Prescription::all()->pluck('date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entry->load('medicine', 'prescription');

        return view('admin.entries.edit', compact('medicines', 'prescriptions', 'entry'));
    }

    public function update(UpdateEntryRequest $request, Entry $entry)
    {
        $entry->update($request->all());

        return redirect()->route('admin.entries.index');
    }

    public function show(Entry $entry)
    {
        abort_if(Gate::denies('entry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entry->load('medicine', 'prescription');

        return view('admin.entries.show', compact('entry'));
    }

    public function destroy(Entry $entry)
    {
        abort_if(Gate::denies('entry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entry->delete();

        return back();
    }

    public function massDestroy(MassDestroyEntryRequest $request)
    {
        Entry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}