<?php

namespace App\Http\Controllers\Admin;

use App\Admin\patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('patients.index', compact('patients'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\patient $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\patient $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('patients.create');
    }
}
