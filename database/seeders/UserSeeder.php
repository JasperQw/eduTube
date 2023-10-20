<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $today = Date::yesterday();
        $day = intval($today->format('d'));

        $user = new User();
        $user->name = "Ng Ching Wei";
        $user->email = "user@email.com";
        $user->password = "$2y$10\$OHPqSKz7RzijSgwpK2BiAOnZ17H3ZUc6RPQpuKEkN4yv84B8RZQvO";
        $user->birthday = "2003-07-06";
        $user->age = 20;
        $user->education_level = "university";
        $user->last_check_in = $day;
        $user->check_in = 6;
        $user->points = 10;
        $user->role = "educator";
        $user->save();

        $user = new User();
        $user->name = "Jasper Ng";
        $user->email = "user2@email.com";
        $user->password = "$2y$10\$OHPqSKz7RzijSgwpK2BiAOnZ17H3ZUc6RPQpuKEkN4yv84B8RZQvO";
        $user->birthday = "2003-07-06";
        $user->age = 20;
        $user->education_level = "university";
        $user->last_check_in = $day;
        $user->check_in = 3;
        $user->role = "counsellor";
        $user->save();

        $user = new User();
        $user->name = "Ng Wei Wei";
        $user->email = "user3@email.com";
        $user->password = "$2y$10\$OHPqSKz7RzijSgwpK2BiAOnZ17H3ZUc6RPQpuKEkN4yv84B8RZQvO";
        $user->birthday = "2003-07-06";
        $user->age = 7;
        $user->education_level = "primary";
        $user->last_check_in = 17;
        $user->check_in = 1;
        $user->save();

        $user = new User();
        $user->name = "Ng Middle Wei";
        $user->email = "user4@email.com";
        $user->password = "$2y$10\$OHPqSKz7RzijSgwpK2BiAOnZ17H3ZUc6RPQpuKEkN4yv84B8RZQvO";
        $user->birthday = "2003-07-06";
        $user->age = 16;
        $user->education_level = "secondary";
        $user->save();
    }
}
