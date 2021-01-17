<?php

namespace App\Http\Controllers\Admin;

use App\Admin\appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('appointments.index', compact('appointments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('appointments.create');
    }
}
