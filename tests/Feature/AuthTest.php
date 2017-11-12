<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function home_route_requires_authentication()
    {
        // visit home without authentication
        $response = $this->get('/');
        $response->assertStatus(302);

        // visit home after authenticated
        $this->signIn();
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
