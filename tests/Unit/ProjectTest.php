<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    /** @test */
    public function admin_can_browse_all_projects()
    {
        $user1 = create('User');
        $project1 = create('Project');
        $project2 = create('Project');

        $this->signIn(null, 'admin');

        $response = $this->get('/admin/projects');

        $response->assertSee($project1->name);
        $response->assertSee($project1->owner->name);
        $response->assertSee($project2->name);
        $response->assertSee($project2->owner->name);
    }

    /** @test */
    public function user_can_access_projects_route()
    {
        $this->signIn();

        $response = $this->get('/projects');
        $response->assertStatus(200);
    }
}
