<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin Role
        $this->createRole('admin', 'Administrator');
        $this->createAbility('browse-admin', 'Can Browse Admin Dashboard');
        $this->addPermission('admin', 'browse-admin');
    }


    private function createRole($name, $title)
    {
        \Silber\Bouncer\Database\Role::create([
            'name' => $name,
            'title' => $title
        ]);
    }

    private function createAbility($name, $title)
    {
        \Silber\Bouncer\Database\Ability::create([
            'name' => $name,
            'title' => $title
        ]);
    }

    private function addPermission($role, $ability)
    {
        Bouncer::allow($role)->to($ability);
    }
}
