<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Lighthouse\User::create([
            'first_name' => $this->command->ask('First Name'),
            'last_name'  => $this->command->ask('Last Name'),
            'email'      => $this->command->ask('Email Address'),
            'password'   => bcrypt($this->command->secret('Password')),
        ]);

        $user->assign('admin');
    }
}
