<?php

namespace App\Http\Controllers\Admin;

use App\Admin\material;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('materials.index', compact('materials'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\material $material
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Material $material)
    {
        return view('materials.show', compact('materials'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\material $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Material $material)
    {
        return view('materials.edit', compact('materials'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('materials.create');
    }
}
