<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Order\Detail;
use App\Models\Order\Order;
use App\Models\Product\Product;
use App\Models\Product\Type as ProductType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Facades\TelegramFacade;
use App\Services\TelegramService;
use Telegram;

class POSController extends Controller
{
    public function getProducts()
    {
        $data = ProductType::select('id', 'name')
            ->with([
                'products:id,name,image,type_id,unit_price'
            ])
            ->get();

        return response()->json($data, Response::HTTP_OK);
    }

    public function makeOrder(Request $req)
    {
        //return env('TELEGRAM_BOT_TOKEN');

        //==============================>> Check validation
        $this->validate($req, [
            'cart'      => 'required|json'
        ]);

        //==============================>> Get Current Login User to save who make orders.
        $user = JWTAuth::parseToken()->authenticate();

        // ===>> Create Order
        $order                  = new Order;
        $order->cashier_id      = $user->id;
        $order->total_price     = 0;
        $order->receipt_number  = $this->generateReceiptNumber();
        $order->save();

        // ===>> Find Total Price & Order Detail
        $details    = [];
        $totalPrice = 0;
        $cart       = json_decode($req->cart); // Turn Json String to PHP Array.

        foreach ($cart as $productId => $qty) {

            $product = Product::find($productId);
            if ($product) {
                $details[] = [
                    'order_id'      => $order->id,
                    'product_id'    => $productId,
                    'qty'           => $qty,
                    'unit_price'    => $product->unit_price,
                ];

                $totalPrice +=  $qty * $product->unit_price;
            }
        }

        // ===>> Save to Details
        Detail::insert($details);

        // ===>> Update Order
        $order->total_price     = $totalPrice;
        $order->ordered_at      = Date('Y-m-d H:i:s');
        $order->save();

        // ===> Get Data for Client Reponse to view the order in Popup.
        $orderData = Order::select('*')
            ->with([

                'cashier:id,name,type_id',
                'cashier.type:id,name',

                'details:id,order_id,product_id,unit_price,qty',
                'details.product:id,name,type_id',
                'details.product.type:id,name'

            ])
            ->find($order->id);

        // Send Telegram Notification
        $htmlMessage = "<b>ការបញ្ជាទិញទទួលបានជោគជ័យ!</b>\n";
        $htmlMessage .= "- លេខវិកយប័ត្រ៖ " . $orderData->receipt_number . "\n";
        $htmlMessage .= "- អ្នកគិតលុយ៖ " . $orderData->cashier->name;

        $productList = '';
        $totalProducts = 0;

        foreach ($order->details as $detail) {
            $productList .= sprintf(
                "%-20s | %-15s | %-10s | %s\n",
                $detail->product->name,
                $detail->unit_price,
                $detail->qty,
                PHP_EOL
            );
            $totalProducts += $detail->qty;
        }

        $htmlMessage .= "\n---------------------------------------\n";
        $htmlMessage .= "ផលិតផល             | តម្លៃដើម(៛)     | បរិមាណ\n";
        $htmlMessage .= $productList . "\n";
        $htmlMessage .= "<b>* សរុបទាំងអស់៖</b> $totalProducts ទំនិញ $order->total_price ៛\n";
        $htmlMessage .= "- កាលបរិច្ឆេទ: " . $order->ordered_at;

        //=================================
        TelegramService::sendMessage($htmlMessage);

        return response()->json([
            'order'         => $orderData,
            'message'       => 'ការបញ្ជាទិញត្រូវបានបង្កើតដោយជោគជ័យ។'
        ], Response::HTTP_OK);
    }

    function generateReceiptNumber()
    {
        $number = rand(1000000, 9999999);
        $check  = Order::where('receipt_number', $number)->first();
        if ($check) {
            return $this->generateReceiptNumber();
        }

        return $number;
    }
}
