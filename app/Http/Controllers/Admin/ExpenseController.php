<?php

namespace App\Http\Controllers\Admin;

use App\Admin\expense;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('expenses.index', compact('expenses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\expense $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Expense $expense)
    {
        return view('expenses.show', compact('expenses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\expense $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Expense $expense)
    {
        return view('expenses.edit', compact('expenses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('expenses.create');
    }
}
