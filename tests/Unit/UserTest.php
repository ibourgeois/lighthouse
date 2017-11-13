<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /** @test */
    public function admin_can_browse_all_users()
    {
        $user1 = create('User');
        $user2 = create('User');

        $this->signIn(null, 'admin');
        $response = $this->get('/admin/users');

        $response->assertSee($user1->name);
        $response->assertSee($user1->email);

        $response->assertSee($user2->name);
        $response->assertSee($user2->email);
    }
}
