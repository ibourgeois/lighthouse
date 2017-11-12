<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null, $role = null)
    {
        $user = $user ?: create('User');

        if ($role) {
            $user->assign($role);
        }

        $this->actingAs($user);

        return $this;
    }
}
