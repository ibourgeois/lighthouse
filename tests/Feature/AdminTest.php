<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function only_admin_can_access_dashboard()
    {
        // visit admin route without suthentication
        $response = $this->get('/admin');
        $response->assertStatus(302);

        // visit admin route with authentication but no admin role
        $this->signIn();
        $response = $this->get('/admin');
        $response->assertStatus(302);

        // visit admin route with authentication and admin role
        $this->signIn(null, 'admin');
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }
}
