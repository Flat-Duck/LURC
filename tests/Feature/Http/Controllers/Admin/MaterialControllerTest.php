<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\MaterialController
 */
class MaterialControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('material.index'));

        $response->assertOk();
        $response->assertViewIs('materials.index');
        $response->assertViewHas('materials');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $material = Material::factory()->create();

        $response = $this->get(route('material.show', $material));

        $response->assertOk();
        $response->assertViewIs('materials.show');
        $response->assertViewHas('materials');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $material = Material::factory()->create();

        $response = $this->get(route('material.edit', $material));

        $response->assertOk();
        $response->assertViewIs('materials.edit');
        $response->assertViewHas('materials');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('material.create'));

        $response->assertOk();
        $response->assertViewIs('materials.create');
    }
}
