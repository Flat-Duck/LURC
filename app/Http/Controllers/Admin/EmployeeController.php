<?php

namespace App\Http\Controllers\Admin;

use App\Admin\employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('employees.index', compact('employees'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Employee $employee)
    {
        return view('employees.show', compact('employees'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Employee $employee)
    {
        return view('employees.edit', compact('employees'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('employees.create');
    }
}
