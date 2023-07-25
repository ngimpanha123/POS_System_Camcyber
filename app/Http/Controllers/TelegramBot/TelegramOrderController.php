<?php

namespace App\Http\Controllers\TelegramBot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramOrderController extends Controller
{
    public static function sendOrderNotification($order, $cashier_name= ''){
    
        if($order){
            $chatID = env('ORDER_CHANNEL_ID');
            $res = Telegram::sendMessage([
            'chat_id' => $chatID,
            'text'    => ' <b>ការបញ្ជាទិញទទួលបានជោគជ័យ!</b>
- លេខវិកយប័ត្រ៖​​ '.$order->receipt_number.'
- អ្នកគិតលុយ  ៖​ '.$cashier_name.'
- តម្លៃសរុប    ៖​​ '.$order->total_price.'
- កាលបរិច្ឆេទ ​៖​ '.$order->ordered_at.'
            ',
            'parse_mode' => 'HTML'
        ]);
        
        return $res;
        }
    
    }
}
