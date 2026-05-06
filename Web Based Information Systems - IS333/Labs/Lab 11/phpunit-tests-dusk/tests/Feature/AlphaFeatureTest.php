<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlphaFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/alpha');

        $response->assertStatus(200);
        $response->assertSee('Alpha');
        $response->assertDontSee('Beta');
    }
}
