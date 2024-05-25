<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MainController;
use App\Models\Order\Order;
use App\Services\TelegramService;
use Illuminate\Database\QueryException;

class PrintController extends MainController
{
    private $JS_BASE_URL;
    private $JS_USERNAME;
    private $JS_PASSWORD;
    private $JS_TEMPLATE;

    public function __construct()
    {
        $this->JS_BASE_URL   = env('JS_BASE_URL');
        $this->JS_USERNAME   = env('JS_USERNAME');
        $this->JS_PASSWORD   = env('JS_PASSWORD');
        $this->JS_TEMPLATE   = env('JS_TEMPLATE');
    }
    public function printInvoiceOrder($receiptNumber = 0)
    {
        try {

            // Payload to be sent to JS Report Service
            $payload = [
                "template" => [
                    "name" => '/Invoice/main',
                ],
                "data" => $this->_getRecieptData($receiptNumber),
            ];

            // Send Request ot JS Report Service
            $response = Http::withBasicAuth($this->JS_USERNAME, $this->JS_PASSWORD)
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post($this->JS_BASE_URL . '/api/report', $payload);

            // Success Response Back to Client
            return [
                'file_base64'   => base64_encode($response),
                'error'         => '',
            ];

            $telegramResponse = TelegramService::sendDocument($fileContent, $fileName, env('TELEGRAM_CHAT_ID'));

        } catch (\Exception $e) {

            // Handle the exception
            return [
                'file_base64' => '',
                'error' => $e->getMessage(),
            ];
        }
    }
    private function _getRecieptData($receiptNumber = 0)
    {
        try {

            // Get Data from DB
            $data = Order::select('id', 'receipt_number', 'cashier_id', 'total_price', 'ordered_at')
            ->with([
                'cashier', // M:1
                'details' // 1:M
            ])
            ->where('receipt_number', $receiptNumber) // Condition
            ->first();

            // Return data Back
            return $data;

        } catch (\Exception $e) {

            // Handle the exception
            return [
                'total' => 0,
                'data' => [],
                'error' => $e->getMessage(),
            ];
        }
    }


}
