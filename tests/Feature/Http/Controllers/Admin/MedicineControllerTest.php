<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\MedicineController
 */
class MedicineControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('medicine.index'));

        $response->assertOk();
        $response->assertViewIs('medicines.index');
        $response->assertViewHas('medicines');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $medicine = Medicine::factory()->create();

        $response = $this->get(route('medicine.show', $medicine));

        $response->assertOk();
        $response->assertViewIs('medicines.show');
        $response->assertViewHas('medicines');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $medicine = Medicine::factory()->create();

        $response = $this->get(route('medicine.edit', $medicine));

        $response->assertOk();
        $response->assertViewIs('medicines.edit');
        $response->assertViewHas('medicines');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('medicine.create'));

        $response->assertOk();
        $response->assertViewIs('medicines.create');
    }
}
