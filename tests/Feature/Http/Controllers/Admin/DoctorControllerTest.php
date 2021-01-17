<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\DoctorController
 */
class DoctorControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('doctor.index'));

        $response->assertOk();
        $response->assertViewIs('doctors.index');
        $response->assertViewHas('doctors');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $doctor = Doctor::factory()->create();

        $response = $this->get(route('doctor.show', $doctor));

        $response->assertOk();
        $response->assertViewIs('doctors.show');
        $response->assertViewHas('doctor');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $doctor = Doctor::factory()->create();

        $response = $this->get(route('doctor.edit', $doctor));

        $response->assertOk();
        $response->assertViewIs('doctors.edit');
        $response->assertViewHas('doctor');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('doctor.create'));

        $response->assertOk();
        $response->assertViewIs('doctors.create');
    }
}
