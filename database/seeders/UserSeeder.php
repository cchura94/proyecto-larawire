<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u1 = new User;
        $u1->name = "admin";
        $u1->email = "admin@mail.com";
        $u1->password = bcrypt("admin54321");
        $u1->save();

        $u2 = new User;
        $u2->name = "oscar";
        $u2->email = "oscar@mail.com";
        $u2->password = bcrypt("oscar54321");
        $u2->save();
    }
}
