<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Postcard;
use App\Models\User;

class PaginationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_first_page_second_page_link(): void
    {
        // Create dummy posts
        Postcard::factory()->count(25)->create();
        $this->actingAs($user = User::factory()->create());        

        // Make a GET request to the homepage
        $response = $this->get('/');

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the pagination link for a specific page
        $response->assertSee('http://localhost?page=2'); 

    }

    public function test_second_page_first_page_link(): void
    {
        // Create dummy posts
        Postcard::factory()->count(25)->create();
        $this->actingAs($user = User::factory()->create());        

        // Make a GET request to page=2
        $response = $this->get('http://localhost?page=2');        

        // Assert that the response contains the pagination link for a specific page
        $response->assertSee('http://localhost/'); 
    }
}
