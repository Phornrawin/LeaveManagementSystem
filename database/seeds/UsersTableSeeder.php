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
        $admin = new App\User;
        $admin->id = 0;
        $admin->email = 'administrator@example.com';
        $admin->password = bcrypt('adminpassword');
        $admin->firstname = 'Administrator';
        $admin->lastname = 'Roger';
        $admin->gender = 'female';
        $admin->image = null;
        $admin->supervisor_id = null;
        $admin->department_id = null;
        $admin->position_id = null;
        $admin->tel = '0989346866';
        $admin->facebook = 'Poy Chitsoonthorn';
        $admin->line = 'poyzozozodiac';
        $admin->is_admin = true;
        $admin->save();
        for ($i=0; $i < 50; $i++) { 
            factory(App\User::class, 1)->create();
        }

    }
}
