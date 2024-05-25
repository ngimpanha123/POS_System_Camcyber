<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    public static function sendMessage($msg, $channel_id)
    {
        $bot_token  = env('TELEGRAM_BOT_TOKEN');
        $chat_id    = $channel_id;  //env('TELEGRAM_CHAT_ID');
        try {
            return Http::withOptions(['verify' => false])->get("https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$chat_id&text=$msg&parse_mode=html");
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function sendDocument($document, $filename, $channel_id)
    {
        $bot_token  = env('TELEGRAM_BOT_TOKEN');
        $chat_id    = $channel_id;  //env('TELEGRAM_CHAT_ID');
        $url = "https://api.telegram.org/bot$bot_token/sendDocument";

        try {
            $response = Http::attach('document', $document, $filename)
                ->post($url, [
                    'chat_id' => $chat_id,
                ]);
            return $response->json();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
