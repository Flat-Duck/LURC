<?php

namespace App\Http\Controllers\Admin;

use App\Admin\medicine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('medicines.index', compact('medicines'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Medicine $medicine)
    {
        return view('medicines.show', compact('medicines'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Medicine $medicine)
    {
        return view('medicines.edit', compact('medicines'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('medicines.create');
    }
}
