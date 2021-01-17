<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ExpenseController
 */
class ExpenseControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('expense.index'));

        $response->assertOk();
        $response->assertViewIs('expenses.index');
        $response->assertViewHas('expenses');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $expense = Expense::factory()->create();

        $response = $this->get(route('expense.show', $expense));

        $response->assertOk();
        $response->assertViewIs('expenses.show');
        $response->assertViewHas('expenses');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $expense = Expense::factory()->create();

        $response = $this->get(route('expense.edit', $expense));

        $response->assertOk();
        $response->assertViewIs('expenses.edit');
        $response->assertViewHas('expenses');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('expense.create'));

        $response->assertOk();
        $response->assertViewIs('expenses.create');
    }
}
