<?php

use App\User;
use App\Worker;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Nikoloz Gvritishvili";
        $user->email = "ng@contractzero.com";
        $user->role = "Manager";
        $user->phone = "596 12 78 93";
        $user->address = "a. machavariani 14";
        $user->vocation_days = 25;
        $user->password = bcrypt('123123123');
        $user->email_verified_at = Carbon::now();
        $user->save();

        $array = [

            'Sandro Pailodze',
            'Sandro Kekelia',
            'Koki Merabishvili',
            'Nini Kikava',
            'Samuel Visscher',
            'Mariam Merabishvili',
            'Zuka Merabishvili',

        ];

        $arrayManagers = [
            'Nino Pailodze',
        ];

        foreach ($array as $item) {
            $user = new User();
            $user->name = $item;
            $user->email = str_slug($item) . '@cz.com';
            $user->role = "Employee";
            $user->phone = "599 11 11 11";
            $user->address = "Tarkhnishvili 4";
            $user->vocation_days = 25;
            $user->password = bcrypt('123123');
            $user->email_verified_at = Carbon::now();
            $user->save();

        }

        foreach ($arrayManagers as $item) {
            $user = new User();
            $user->name = $item;
            $user->email = str_slug($item) . '@cz.com';
            $user->role = "Manager";
            $user->phone = "599 99 99 99";
            $user->address = "Janashia 14";
            $user->vocation_days = 25;
            $user->password = bcrypt('123123');
            $user->email_verified_at = Carbon::now();
            $user->save();

        }
    }
}
