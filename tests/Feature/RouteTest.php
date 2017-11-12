<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{
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

    /** @test */
    public function only_admin_can_access_dashboard()
    {
        // visit admin route without authentication
        $response = $this->get('/admin');
        $response->assertRedirect('/login');

        // visit admin route with authentication but no admin role
        $this->signIn();
        $response = $this->get('/admin');
        $response->assertRedirect('/');

        // visit admin route with authentication and admin role
        $this->signIn(null, 'admin');
        $response = $this->get('/admin');
        $response->assertViewIs('admin.index');
    }
}
