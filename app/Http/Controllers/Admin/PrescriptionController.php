<?php

namespace App\Http\Controllers\Admin;

use App\Admin\prescription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('prescriptions.index', compact('prescriptions'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\prescription $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Prescription $prescription)
    {
        return view('prescriptions.show', compact('prescriptions'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\prescription $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Prescription $prescription)
    {
        return view('prescriptions.edit', compact('prescriptions'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('prescriptions.create');
    }
}
