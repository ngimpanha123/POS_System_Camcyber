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
                'email'         => 'staff1@gmail.com',
                'phone'         => '020000001',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Heng Meymey',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'staff2@gmail.com',
                'phone'         => '0965175578',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Kim Sonen',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'   	=> 2,
                'email'         => 'songhak@gmail.com',
                'phone'         => '012263562',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Chrech songhak',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ] ,
            [
                'type_id'       => 2,
                'email'         => 'vanuth@gmail.com',
                'phone'         => '012263561',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Ven Vanuth',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'hychin247@gmail.com',
                'phone'         => '0975063390',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Hy Chin',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'hieklymonyratanak@gmail.com',
                'phone'         => '0885439988',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Hiek Lymonyratanak',
                'avatar'        => 'static/icon/user.png',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'type_id'       => 2,
                'email'         => 'chhit085@gmail.com',
                'phone'         => '085720085',
                'password'      => bcrypt('123456'),
                'is_active'     => 1,
                'name'          => 'Chharng Chhit',
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
