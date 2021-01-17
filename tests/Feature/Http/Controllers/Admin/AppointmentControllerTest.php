<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\AppointmentController
 */
class AppointmentControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('appointment.index'));

        $response->assertOk();
        $response->assertViewIs('appointments.index');
        $response->assertViewHas('appointments');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $appointment = Appointment::factory()->create();

        $response = $this->get(route('appointment.show', $appointment));

        $response->assertOk();
        $response->assertViewIs('appointments.show');
        $response->assertViewHas('appointment');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $appointment = Appointment::factory()->create();

        $response = $this->get(route('appointment.edit', $appointment));

        $response->assertOk();
        $response->assertViewIs('appointments.edit');
        $response->assertViewHas('appointment');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('appointment.create'));

        $response->assertOk();
        $response->assertViewIs('appointments.create');
    }
}
