<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | Create User Type: Admin & Staff
        |--------------------------------------------------------------------------
        */
        DB::table('users_type')->insert(
            [
                ['name' => 'Admin'],
                ['name' => 'Staff'],
            ]
        );
        /*
        |--------------------------------------------------------------------------
        | Create User
        |--------------------------------------------------------------------------
        */
        $users =  [
            [
                'type_id'       => 2,
                'email'         => 'korbdaven@gmail.com',
                'phone'         => '098765430',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Mr. Korb Daven',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'chansuvannet@gmail.com',
                'phone'         => '098765431',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Mr. Chan Suvannet',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'kongchankiry@gmail.com',
                'phone'         => '098765432',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Mr. Kong Chankiry',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'krinboven@gmail.com',
                'phone'         => '098765433',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Mr. Krin Boven',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'khuoyborinsatya@gmail.com',
                'phone'         => '098765434',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Mr. Khuoy Borin Satya',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'chhuenchihay@gmail.com',
                'phone'         => '098765435',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Mr. Chhuen Chihay',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'haikimsreng@gmail.com',
                'phone'         => '098765436',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Mr. Hai Kimsreng',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'chornarin@gmail.com',
                'phone'         => '098765437',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Mr. Chor Narin',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 1,
                'email'         => 'yimklok.parody@gmail.com',
                'phone'         => '098765438',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Acct. Yim Klok',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 1,
                'email'         => 'korbdaven.parody@gmail.com',
                'phone'         => '098765439',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Acct. Korb Daven',
                'avatar'           => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Write To Database
        |--------------------------------------------------------------------------
        |
        | It will insert to table users of database minimart.
        |
        */
        DB::table('user')->insert($users);
    }
}

