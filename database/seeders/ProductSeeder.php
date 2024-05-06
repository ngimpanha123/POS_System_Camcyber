<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |-------------------------------------------------------------------------------
        | Add Product Type First because relationship from products_type to products 1:M
        |-------------------------------------------------------------------------------
        */
        DB::table('products_type')->insert(
            [
                ['name' => 'Snack',
                 'created_at' => now(),
                 'updated_at' => now()
                ],
                ['name' => 'Food-Meat',
                 'created_at' => now(),
                 'updated_at' => now()
                ],
                ['name' => 'Beverage',
                 'created_at' => now(),
                 'updated_at' => now()
                ],
                ['name' => 'Beauty',
                 'created_at' => now(),
                 'updated_at' => now()
                ],
                ['name' => 'Computer',
                 'created_at' => now(),
                 'updated_at' => now()
                ],
                ['name' => 'Tablet',
                 'created_at' => now(),
                 'updated_at' => now()
                ],
                
                ['name' => 'Shoe',
                 'created_at' => now(),
                 'updated_at' => now()
                ],
                ['name' => 'T-shirt',
                 'created_at' => now(),
                 'updated_at' => now()
                ],
                ['name' => 'Hat',
                 'created_at' => now(),
                 'updated_at' => now()
                ],
                ['name' => 'Book',
                 'created_at' => now(),
                 'updated_at' => now()
                ],
               
            ]
        );

        /*
        |-------------------------------------------------------------------------------
        | Add 20 Products
        |-------------------------------------------------------------------------------
        */
        DB::table('product')->insert(
            [
                [
                    'code' => 'Ax00001',
                    'type_id' => '1',
                    'name' => 'Milch Schoko',
                    'unit_price' => 15000,
                    'image' => 'static/Products/Snack/milch-schoko.png',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'code' => 'Ax00002',
                    'type_id' => '1',
                    'name' => 'Chikki',
                    'unit_price' => 19000,
                    'image' => 'static/Products/Snack/chikki.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Bx00001',
                    'type_id' => '2',
                    'name' => 'Chicken',
                    'unit_price' => 50000,
                    'image' => 'static/Products/Food-Meat/chicken-meat.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Bx00002',
                    'type_id' => '2',
                    'name' => 'Beef',
                    'unit_price' => 100000,
                    'image' => 'static/Products/Food-Meat/beef.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Cx00001',
                    'type_id' => '3',
                    'name' => 'Cream Soda',
                    'unit_price' => 10000,
                    'image' => 'static/Products/Beverage/creamsoda.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Cx00002',
                    'type_id' => '3',
                    'name' => 'Heineken',
                    'unit_price' => 15000,
                    'image' => 'static/Products/Beverage/heineken.jpg',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'code' => 'Dx00001',
                    'type_id' => '4',
                    'name' => 'Boscia',
                    'unit_price' => 22000,
                    'image' => 'static/Products/Beauty/boscia.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Dx00002',
                    'type_id' => '4',
                    'name' => 'Lip Gloss',
                    'unit_price' => 20000,
                    'image' => 'static/Products/Beauty/lipgloss.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ex00001',
                    'type_id' => '5',
                    'name' => 'Computer1',
                    'unit_price' => 5000000,
                    'image' => 'static/Products/Computer/Desktop.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ex00002',
                    'type_id' => '5',
                    'name' => 'Computer2',
                    'unit_price' => 10000000,
                    'image' => 'static/Products/Computer/mac-pc.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Fx00001',
                    'type_id' => '6',
                    'name' => 'Tablet V1',
                    'unit_price' => 3500000,
                    'image' => 'static/Products/Tablet/tablet-v1.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Fx00002',
                    'type_id' => '6',
                    'name' => 'Tablet V2',
                    'unit_price' => 5000000,
                    'image' => 'static/Products/Tablet/tablet-v2.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],

               

                [
                    'code' => 'Gx00001',
                    'type_id' => '7',
                    'name' => 'Black Shoes',
                    'unit_price' => 50000,
                    'image' => 'static/Products/Shoe/black-shoe.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Gx00002',
                    'type_id' => '7',
                    'name' => 'Red Shoes',
                    'unit_price' => 80000,
                    'image' => 'static/Products/Shoe/red-shoe.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Hx00001',
                    'type_id' => '8',
                    'name' => 'Black T-shirt',
                    'unit_price' => 20000,
                    'image' => 'static/Products/T-shirt/black-t-shirt.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                
                [
                    'code' => 'Hx00002',
                    'type_id' => '8',
                    'name' => 'White T-shirt',
                    'unit_price' => 30000,
                    'image' => 'static/Products/T-shirt/white-t-shirt.jpg',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
               
                [
                    'code' => 'Ix00002',
                    'type_id' => '9',
                    'name' => 'Cowboy Hat',
                    'unit_price' => 20000,
                    'image' => 'static/Products/Hat/cowboy-hat.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ix00001',
                    'type_id' => '9',
                    'name' => 'Cap',
                    'unit_price' => 10000,
                    'image' => 'static/Products/Hat/cap.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
               
                [
                    'code' => 'Jx00001',
                    'type_id' => '10',
                    'name' => 'Ecosystem Economy',
                    'unit_price' => 40000,
                    'image' => 'static/Products/Book/ecosystem-economics.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Jx00002',
                    'type_id' => '10',
                    'name' => 'The Lean Startup',
                    'unit_price' => 55000,
                    'image' => 'static/Products/Book/the-lean-startup.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}
