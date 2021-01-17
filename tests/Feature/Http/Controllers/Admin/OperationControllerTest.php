<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\OperationController
 */
class OperationControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('operation.index'));

        $response->assertOk();
        $response->assertViewIs('operations.index');
        $response->assertViewHas('operations');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $operation = Operation::factory()->create();

        $response = $this->get(route('operation.show', $operation));

        $response->assertOk();
        $response->assertViewIs('operations.show');
        $response->assertViewHas('operations');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $operation = Operation::factory()->create();

        $response = $this->get(route('operation.edit', $operation));

        $response->assertOk();
        $response->assertViewIs('operations.edit');
        $response->assertViewHas('operations');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('operation.create'));

        $response->assertOk();
        $response->assertViewIs('operations.create');
    }
}
