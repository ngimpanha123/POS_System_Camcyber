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
                'type_id'       => 1,
                'email'         => 'yimklok.kh@gmail.com',
                'phone'         => '0977779688',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Yim Klok',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'type_id'       => 2,
                'email'         => 'yomklok.kh@gmail.com',
                'phone'         => '0977779680',
                'email'         => 'www.vanhong168@gmail.com',
                'phone'         => '060486849',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Yim Klok',
                'name'          => 'Roeun Sophat',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'satya.kh@gmail.com',
                'phone'         => '0977779681',
                'email'         => 'kimhak300@gmail.com',
                'phone'         => '0884317616',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Satya',
                'name'          => 'noem koemhak',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'sophy.kh@gmail.com',
                'phone'         => '016202693',
                'email'         => 'panha0@gmail.com',
                'phone'         => '060473432',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Sophy',
                'name'          => 'ngim panha',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'ngimpanha@gmail.com',
                'phone'         => '0966817805',
                'email'         => 'bopha3@gmail.com',
                'phone'         => '098286849',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'panha',
                'name'          => 'bo pha',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'bora23@gmail.com',
                'phone'         => '060932748',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'bora',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'dyna54@gmail.com',
                'phone'         => '017310606',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'dyna',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'raksa123@gmail.com',
                'phone'         => '096123845',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'raksa',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'mina23@gmail.com',
                'phone'         => '069845943',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'mina',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'menghorng23@gmail.com',
                'phone'         => '071298323',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'menghorng',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'tata23@gmail.com',
                'phone'         => '078234832',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'tata',
                'avatar'        => 'static/icon/user.png',
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
