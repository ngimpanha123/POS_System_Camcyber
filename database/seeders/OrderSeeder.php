<?php

namespace Database\Seeders;

use App\Models\Order\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 1000; $i++) {

            $data[] = [
                'receipt_number' => $this->generateReceiptNumber(),
                'cashier_id' => rand(1, 3),
                'total_price' => 0,
                'discount' => 0,
                'total_received' => 0,
                'ordered_at' => Date('Y-m-d H:i:s'),
                'paid_at' => Date('Y-m-d H:i:s')
            ];
        }

        /*
        |-------------------------------------------------------------------------------
        | Insert into table orders
        |-------------------------------------------------------------------------------
        */
        DB::table('orders')->insert($data);

        /*
        |-------------------------------------------------------------------------------
        | Create Order Detail
        |-------------------------------------------------------------------------------
        */
        $orders = Order::get();
        foreach ($orders as $order) {

            $details        = [];
            $totalPrice     = 0;
            $nOfDetails     = rand(1, 6); //ចំនួនផលិតផលនៅក្នុងបុង

            for ($i = 1; $i <= $nOfDetails; $i++) {

                $product    = DB::table('products')->find(rand(1, 20));
                $qty        = rand(1, 10);

                $totalPrice += $product->unit_price * $qty;

                $details[] = [
                    'order_id'      => $order->id,
                    'product_id'    => $product->id,
                    'qty'           => $qty,
                    'unit_price'    => $product->unit_price
                ];
            }

            DB::table('orders_detail')->insert($details);

            $order->total_price     = $totalPrice;
            $order->save();
        }
    }

    public function generateReceiptNumber()
    {

        $number = rand(100000, 999999);
        $check = DB::table('orders')->where('receipt_number', $number)->first();
        if ($check) {
            return $this->generateReceiptNumber();
        }
        return $number;
    }
}
