<?php

namespace App\Http\Controllers\Admin;

use App\Admin\doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('doctors.index', compact('doctors'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('doctors.create');
    }
}
