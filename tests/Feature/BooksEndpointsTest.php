<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BooksEndpointsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create()
    {
        $response = $this->post('/api/v1/books', [
            'name' => 'My First Book',
            'isbn' => '123-3213243567',
            'authors' => ['John Doe'],
            'number_of_pages' => 350,
            'publisher' => 'Acme Books',
            'country' => 'United States',
            'release_date' => '2019-08-01',
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure(['status_code', 'status', 'data' => ['name', 'isbn', 'authors', 'number_of_pages', 'publisher', 'country', 'release_date']]);
    }

    public function test_read()
    {
        $response = $this->get('/api/v1/books');

        $response->assertStatus(200);
        $response->assertJsonStructure(['status_code', 'status', 'data']);
    }

    public function test_update()
    {
        $this->test_create();
        $response = $this->patch('/api/v1/books/2', [
            'name' => 'My First Updated Book',
            'isbn' => '123-3213243567',
            'authors' => ['John Doe'],
            'number_of_pages' => 350,
            'publisher' => 'Acme Books Publishing',
            'country' => 'United States',
            'release_date' => '2019-01-01',
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure(['status_code', 'status', 'message', 'data' => ['name', 'isbn', 'authors', 'number_of_pages', 'publisher', 'country', 'release_date']]);
    }

    public function test_delete()
    {
        $this->test_create();
        $response = $this->delete("/api/v1/books/3");
        $response->assertStatus(200);
        $response->assertJsonStructure(['status_code', 'status', 'message', 'data']);
    }

    public function test_show()
    {
        $this->test_create();
        $response = $this->get("/api/v1/books/4");
        $response->assertStatus(200);
        $response->assertJsonStructure(['status_code', 'status', 'data' => ['name', 'isbn', 'authors', 'number_of_pages', 'publisher', 'country', 'release_date']]);
    }
}
