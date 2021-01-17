<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\EmployeeController
 */
class EmployeeControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('employee.index'));

        $response->assertOk();
        $response->assertViewIs('employees.index');
        $response->assertViewHas('employees');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employee.show', $employee));

        $response->assertOk();
        $response->assertViewIs('employees.show');
        $response->assertViewHas('employees');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employee.edit', $employee));

        $response->assertOk();
        $response->assertViewIs('employees.edit');
        $response->assertViewHas('employees');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('employee.create'));

        $response->assertOk();
        $response->assertViewIs('employees.create');
    }
}
