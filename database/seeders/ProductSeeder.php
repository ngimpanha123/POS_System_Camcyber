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
                ['name' => 'Teacher',
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
                // Snack food
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
                    'code' => 'Ax00003',
                    'type_id' => '1',
                    'name' => 'Cheezit',
                    'unit_price' => 15000,
                    'image' => 'static/Products/Snack/cheezit.png',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'code' => 'Ax00004',
                    'type_id' => '1',
                    'name' => 'Protein Snack',
                    'unit_price' => 19000,
                    'image' => 'static/Products/Snack/protein-snack.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ax00005',
                    'type_id' => '1',
                    'name' => 'Snickers',
                    'unit_price' => 19000,
                    'image' => 'static/Products/Snack/snickers.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                // Food Meat
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
                    'code' => 'Bx00003',
                    'type_id' => '2',
                    'name' => 'Clam',
                    'unit_price' => 50000,
                    'image' => 'static/Products/Food-Meat/clam.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Bx00004',
                    'type_id' => '2',
                    'name' => 'Crab',
                    'unit_price' => 100000,
                    'image' => 'static/Products/Food-Meat/crab.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Bx00005',
                    'type_id' => '2',
                    'name' => 'Jerky Beef',
                    'unit_price' => 100000,
                    'image' => 'static/Products/Food-Meat/jerky-beef.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                // Dricking 
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
                    'code' => 'Cx00003',
                    'type_id' => '3',
                    'name' => 'Egb',
                    'unit_price' => 10000,
                    'image' => 'static/Products/Beverage/egb.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Cx00004',
                    'type_id' => '3',
                    'name' => 'G',
                    'unit_price' => 15000,
                    'image' => 'static/Products/Beverage/g.jpg',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'code' => 'Cx00005',
                    'type_id' => '3',
                    'name' => 'IZE',
                    'unit_price' => 15000,
                    'image' => 'static/Products/Beverage/ize.png',
                    'created_at' => now(),
                    'updated_at' => now()

                ],

                // Makeup Beautiful
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
                    'code' => 'Dx00003',
                    'type_id' => '4',
                    'name' => 'Dark Spot',
                    'unit_price' => 22000,
                    'image' => 'static/Products/Beauty/dark-spot.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Dx00004',
                    'type_id' => '4',
                    'name' => 'Deep Cleansing Oil',
                    'unit_price' => 20000,
                    'image' => 'static/Products/Beauty/deep-cleansing-oil.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Dx00005',
                    'type_id' => '4',
                    'name' => 'Mauli',
                    'unit_price' => 20000,
                    'image' => 'static/Products/Beauty/mauli.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                
                // Computer 
                [
                    'code' => 'Ex00001',
                    'type_id' => '5',
                    'name' => 'MSI 2023',
                    'unit_price' => 5000000,
                    'image' => 'static/Products/Computer/msi.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ex00002',
                    'type_id' => '5',
                    'name' => 'MSI Summit',
                    'unit_price' => 10000000,
                    'image' => 'static/Products/Computer/msi-summit.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ex00003',
                    'type_id' => '5',
                    'name' => 'MSI Motitor',
                    'unit_price' => 5000000,
                    'image' => 'static/Products/Computer/motiterMSI.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ex00004',
                    'type_id' => '5',
                    'name' => 'Mas',
                    'unit_price' => 10000000,
                    'image' => 'static/Products/Computer/masOs.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ex00005',
                    'type_id' => '5',
                    'name' => 'Desktop Mas',
                    'unit_price' => 10000000,
                    'image' => 'static/Products/Computer/mas.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                // Tablet
                [
                    'code' => 'Fx00001',
                    'type_id' => '6',
                    'name' => 'Huawei',
                    'unit_price' => 3500000,
                    'image' => 'static/Products/Tablet/huawei.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Fx00002',
                    'type_id' => '6',
                    'name' => 'Lenovo',
                    'unit_price' => 5000000,
                    'image' => 'static/Products/Tablet/Lenovo.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Fx00003',
                    'type_id' => '6',
                    'name' => 'M1',
                    'unit_price' => 3500000,
                    'image' => 'static/Products/Tablet/m1.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Fx00004',
                    'type_id' => '6',
                    'name' => 'M2',
                    'unit_price' => 5000000,
                    'image' => 'static/Products/Tablet/m2.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Fx00005',
                    'type_id' => '6',
                    'name' => 'Sangsung',
                    'unit_price' => 5000000,
                    'image' => 'static/Products/Tablet/samsung.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                // Shoes
                [
                    'code' => 'Gx00001',
                    'type_id' => '7',
                    'name' => 'Xylus Black Fancy',
                    'unit_price' => 50000,
                    'image' => 'static/Products/Shoe/wgaoo_512.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Gx00002',
                    'type_id' => '7',
                    'name' => 'James McMillian',
                    'unit_price' => 80000,
                    'image' => 'static/Products/Shoe/images.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Gx00003',
                    'type_id' => '7',
                    'name' => 'Running Shoe',
                    'unit_price' => 50000,
                    'image' => 'static/Products/Shoe/style.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Gx00004',
                    'type_id' => '7',
                    'name' => 'Women Running Shoe',
                    'unit_price' => 80000,
                    'image' => 'static/Products/Shoe/s-l1200.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Gx00005',
                    'type_id' => '7',
                    'name' => 'Crews Women Rae Slip',
                    'unit_price' => 80000,
                    'image' => 'static/Products/Shoe/shoes-for-crews.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                
                // T-shirt
                [
                    'code' => 'Hx00001',
                    'type_id' => '8',
                    'name' => 'AMS',
                    'unit_price' => 20000,
                    'image' => 'static/Products/T-shirt/ams.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Hx00002',
                    'type_id' => '8',
                    'name' => 'MEDIUM WEIGHT T-SHIRT',
                    'unit_price' => 30000,
                    'image' => 'static/Products/T-shirt/black.jpg',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'code' => 'Hx00003',
                    'type_id' => '8',
                    'name' => 'Tomboy',
                    'unit_price' => 20000,
                    'image' => 'static/Products/T-shirt/tomboy.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Hx00004',
                    'type_id' => '8',
                    'name' => 'Hermès Poland',
                    'unit_price' => 30000,
                    'image' => 'static/Products/T-shirt/h-embroidered.jpg',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
                [
                    'code' => 'Hx00005',
                    'type_id' => '8',
                    'name' => 'Eye Sanke',
                    'unit_price' => 30000,
                    'image' => 'static/Products/T-shirt/eyebogle.jpg',
                    'created_at' => now(),
                    'updated_at' => now()

                ],
               
                // Hat
                [
                    'code' => 'Ix00001',
                    'type_id' => '9',
                    'name' => 'Black Hat',
                    'unit_price' => 20000,
                    'image' => 'static/Products/Hat/blackhat.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ix00002',
                    'type_id' => '9',
                    'name' => 'Cowboy',
                    'unit_price' => 10000,
                    'image' => 'static/Products/Hat/cowboy.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ix00003',
                    'type_id' => '9',
                    'name' => 'Aqua Hat',
                    'unit_price' => 20000,
                    'image' => 'static/Products/Hat/Aqua.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ix00004',
                    'type_id' => '9',
                    'name' => 'Bucket Hat',
                    'unit_price' => 10000,
                    'image' => 'static/Products/Hat/Bucket.jng.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Ix00005',
                    'type_id' => '9',
                    'name' => 'Blog Hat',
                    'unit_price' => 10000,
                    'image' => 'static/Products/Hat/block.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
               
                // Book
                [
                    'code' => 'Jx00001',
                    'type_id' => '10',
                    'name' => 'Praktische Statistik für Data Scientist',
                    'unit_price' => 40000,
                    'image' => 'static/Products/Book/statistics.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Jx00002',
                    'type_id' => '10',
                    'name' => 'Introduction to Machine Learning',
                    'unit_price' => 55000,
                    'image' => 'static/Products/Book/ml-with-python.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Jx00003',
                    'type_id' => '10',
                    'name' => 'Python Data Science Handbook',
                    'unit_price' => 40000,
                    'image' => 'static/Products/Book/python.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Jx00004',
                    'type_id' => '10',
                    'name' => 'Data Science',
                    'unit_price' => 55000,
                    'image' => 'static/Products/Book/datascience.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'Jx00005',
                    'type_id' => '10',
                    'name' => 'The Big Book of Data Science Use Cases',
                    'unit_price' => 55000,
                    'image' => 'static/Products/Book/bigbook.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                
                // Teacher
                [
                    'code' => 'ITC00001',
                    'type_id' => '11',
                    'name' => 'Sokkhey Phauk',
                    'unit_price' => 40000,
                    'image' => 'static/Products/Teacher/sokey.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'ITC00002',
                    'type_id' => '11',
                    'name' => 'Sopheak Touch',
                    'unit_price' => 55000,
                    'image' => 'static/Products/Teacher/neagphek.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'ITC00003',
                    'type_id' => '11',
                    'name' => 'K. Thay',
                    'unit_price' => 40000,
                    'image' => 'static/Products/Teacher/K_thy.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'ITC00004',
                    'type_id' => '11',
                    'name' => 'Ponna Phok',
                    'unit_price' => 55000,
                    'image' => 'static/Products/Teacher/phnana.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'code' => 'ITC00005',
                    'type_id' => '11',
                    'name' => 'Pakrigna Long',
                    'unit_price' => 55000,
                    'image' => 'static/Products/Teacher/bigdata.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}
