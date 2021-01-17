<?php

namespace App\Http\Controllers\Admin;

use App\Admin\operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('operations.index', compact('operations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\operation $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Operation $operation)
    {
        return view('operations.show', compact('operations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\operation $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Operation $operation)
    {
        return view('operations.edit', compact('operations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('operations.create');
    }
}
