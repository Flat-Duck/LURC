<?php

namespace App\Http\Controllers\Admin;

use App\Admin\service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('services.index', compact('services'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Service $service)
    {
        return view('services.show', compact('services'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Service $service)
    {
        return view('services.edit', compact('services'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('services.create');
    }
}
