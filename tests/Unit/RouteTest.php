<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
        $response->assertStatus(302);

        // visit admin route with authentication and no admin role
        $this->signIn();
        $response = $this->get('/admin');
        $response->assertStatus(302);

        // visit admin route with authenticaion and admin role
        $this->signIn(null, 'admin');
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    //* @test */
    public function authenticated_users_can_not_visit_login()
    {
        $this->signIn();
        $response = $this->get('/login');
        $response->assertStatus(302);
    }
}
