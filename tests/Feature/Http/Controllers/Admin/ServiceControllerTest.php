<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ServiceController
 */
class ServiceControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('service.index'));

        $response->assertOk();
        $response->assertViewIs('services.index');
        $response->assertViewHas('services');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $service = Service::factory()->create();

        $response = $this->get(route('service.show', $service));

        $response->assertOk();
        $response->assertViewIs('services.show');
        $response->assertViewHas('services');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $service = Service::factory()->create();

        $response = $this->get(route('service.edit', $service));

        $response->assertOk();
        $response->assertViewIs('services.edit');
        $response->assertViewHas('services');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('service.create'));

        $response->assertOk();
        $response->assertViewIs('services.create');
    }
}
