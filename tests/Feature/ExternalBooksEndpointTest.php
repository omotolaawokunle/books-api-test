<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExternalBooksEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_data()
    {
        $response = $this->get('/api/external-books?name=A Game Of Thrones');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status', 'status_code', 'data'
        ]);
    }

    public function test_empty_name()
    {
        $response = $this->get('/api/external-books?name=');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status', 'status_code', 'data'
        ]);
    }
}
