<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Order\Detail;
use App\Models\Order\Order;
use App\Models\Product\Product;
use App\Models\Product\Type as ProductType;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class POSController extends Controller
{
    public function getProducts()
    {
        $data = ProductType::select('id', 'name')
            ->with([
                'products:id,name,image,type_id,unit_price'
            ])
            ->get();

        return $data;
    }
    public function makeOrder(Request $req)
    {
        $user = JWTAuth::parseToken()->authenticate();

        //==============================>> Check validation
        $this->validate($req, [
            'cart' => 'required|json'
        ]);

        // ===>> Create Order
        $order                  = new Order;
        $order->cashier_id      = $user->id; //TODO:: will find cashier later
        $order->receipt_number  = $this->generateReceiptNumber();
        $order->save();

        // ===>> Find Total Price & Order Detail
        $details    = [];
        $totalPrice = 0;
        $cart       = json_decode($req->cart);

        foreach ($cart as $productId => $qty) {

            $product = Product::find($productId);
            if ($product) {

                //Check Stock

                $details[] = [
                    'order_id'      => $order->id,
                    'product_id'    => $productId,
                    'qty'           => $qty,
                    'unit_price'    => $product->unit_price
                ];

                $totalPrice +=  $qty * $product->unit_price;
            }
        }

        //Save tot Details
        Detail::insert($details);

        //Update Order
        $order->total_price     = $totalPrice;
        $order->total_received  = $totalPrice;
        $order->paid_at         = Date('Y-m-d H:i:s');
        $order->ordered_at      = Date('Y-m-d H:i:s');
        $order->save();

        $data           = Order::select('*')
            ->with([
                'cashier',
                'details'
            ])
            ->find($order->id);

        //ToDo: Send Notification


        return response()->json([
            // 'cart' => $cart,
            'order'         => $data,
            'details'       => $details,
            'total_price'   => $totalPrice,
            'message'       => 'ការបញ្ជាទិញត្រូវបានបង្កើតដោយជោគជ័យ។'
        ], 200);
    }

    function generateReceiptNumber()
    {
        $number = rand(1000000, 9999999);
        $check = Order::where('receipt_number', $number)->first();
        if ($check) {
            return $this->generateReceiptNumber();
        }
        return $number;
    }
}
