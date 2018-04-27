<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = new App\User;
        // $admin->id = 0;
        // $admin->email = 'administrator@example.com'
        // $admin->password = bcrypt('adminpassword');
        // $admin->fristname = 'Administrator';
        // $admin->lastname = 'Roger'
        // $admin->gender = 'male'
        // $admin->image = null;
        // $admin->supervisor_id = null;
        // $admin->department_id = null;
        // $admin->position = 'HR';
        // $admin->tel = '0989346866';
        // $admin->facebook = 'Poy Chitsoonthorn'
        // $admin->line = 'poyzozozodiac';
        // $admin->save();
        factory(App\User::class, 50)->create();

    }
}
