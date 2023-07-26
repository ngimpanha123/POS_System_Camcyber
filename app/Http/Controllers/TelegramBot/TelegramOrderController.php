<?php

namespace App\Http\Controllers\TelegramBot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramOrderController extends Controller
{
    public static function sendOrderNotification($order){
    
        $prodcutList = '';
        $totalProduct = 0;
        foreach ($order->details as $detail){
            $prodcutList .=$detail->product->name . '   | ' . 
            $detail->qty . '    | ' . 
            $detail->unit_price . PHP_EOL;
            $totalProduct += $detail->qty;
        }
        if($order){
            $chatID = env('ORDER_CHANNEL_ID');
            $res = Telegram::sendMessage([
            'chat_id' => $chatID,
            'text'    => ' <b>ការបញ្ជាទិញទទួលបានជោគជ័យ!</b>
- លេខវិកយប័ត្រ៖​​ '.$order->receipt_number.'
- អ្នកគិតលុយ  ៖​ '.$order->cashier->name.'
----------------------------------------
ផលិតផល​   |បរិមាណ   |តម្លៃ(រៀល)
'.$prodcutList.' 
    |'.$totalProduct.'   | '.$order->total_price.'
- កាលបរិច្ឆេទ ​៖​ '.$order->ordered_at.'
            ',
            'parse_mode' => 'HTML'
        ]);
        
        return $res;
        }
    
    }
}
