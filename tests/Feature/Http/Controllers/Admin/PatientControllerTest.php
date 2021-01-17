<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\PatientController
 */
class PatientControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('patient.index'));

        $response->assertOk();
        $response->assertViewIs('patients.index');
        $response->assertViewHas('patients');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $patient = Patient::factory()->create();

        $response = $this->get(route('patient.show', $patient));

        $response->assertOk();
        $response->assertViewIs('patients.show');
        $response->assertViewHas('patient');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $patient = Patient::factory()->create();

        $response = $this->get(route('patient.edit', $patient));

        $response->assertOk();
        $response->assertViewIs('patients.edit');
        $response->assertViewHas('patient');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('patient.create'));

        $response->assertOk();
        $response->assertViewIs('patients.create');
    }
}
