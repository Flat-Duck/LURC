<?php

namespace App\Http\Controllers\Admin;

use App\Admin\entry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('entries.index', compact('entries'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\entry $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Entry $entry)
    {
        return view('entries.show', compact('entrie'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\entry $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Entry $entry)
    {
        return view('entries.edit', compact('entrie'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('entries.create');
    }
}
