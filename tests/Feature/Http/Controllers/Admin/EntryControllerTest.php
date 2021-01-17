<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\EntryController
 */
class EntryControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('entry.index'));

        $response->assertOk();
        $response->assertViewIs('entries.index');
        $response->assertViewHas('entries');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $entry = Entry::factory()->create();

        $response = $this->get(route('entry.show', $entry));

        $response->assertOk();
        $response->assertViewIs('entries.show');
        $response->assertViewHas('entrie');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $entry = Entry::factory()->create();

        $response = $this->get(route('entry.edit', $entry));

        $response->assertOk();
        $response->assertViewIs('entries.edit');
        $response->assertViewHas('entrie');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('entry.create'));

        $response->assertOk();
        $response->assertViewIs('entries.create');
    }
}
