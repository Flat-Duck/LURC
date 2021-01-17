<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\PrescriptionController
 */
class PrescriptionControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('prescription.index'));

        $response->assertOk();
        $response->assertViewIs('prescriptions.index');
        $response->assertViewHas('prescriptions');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $prescription = Prescription::factory()->create();

        $response = $this->get(route('prescription.show', $prescription));

        $response->assertOk();
        $response->assertViewIs('prescriptions.show');
        $response->assertViewHas('prescriptions');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $prescription = Prescription::factory()->create();

        $response = $this->get(route('prescription.edit', $prescription));

        $response->assertOk();
        $response->assertViewIs('prescriptions.edit');
        $response->assertViewHas('prescriptions');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('prescription.create'));

        $response->assertOk();
        $response->assertViewIs('prescriptions.create');
    }
}
