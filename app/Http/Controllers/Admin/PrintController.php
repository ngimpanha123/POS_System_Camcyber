<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MainController;
use App\Models\Order\Order;
use App\Services\TelegramService;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Auth\AuthController;
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
            // Get user type
            $userType = $this->getUserType();
    
            // Payload to be sent to JS Report Service
            $payload = [
                "template" => [
                    "name" => $this->JS_TEMPLATE,
                ],
                "data" => $this->_getRecieptData($receiptNumber),
            ];
    
            // Send Request to JS Report Service
            $response = Http::withBasicAuth($this->JS_USERNAME, $this->JS_PASSWORD)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post($this->JS_BASE_URL . '/api/report', $payload);
    
            // Convert response to base64 and get binary data
            $fileContent = $response->body();
            $fileName = 'invoice_' . $receiptNumber . '.pdf';
            $filePath = storage_path('app/public/' . $fileName);
    
            // Save file to storage
            file_put_contents($filePath, $fileContent);
    
            if ($userType === 'Admin') {
                // Return base64-encoded response for staff
                // Success Response Back to Client
                return [
                    'file_base64'   => base64_encode($response),
                    'error'         => '',
                ];

            } else {
                // Send file to Telegram for other users
                $telegramResponse = TelegramService::sendDocument($fileContent, $fileName, env('TELEGRAM_CHAT_JSREPORT'));
    
                return [
                    'telegramResponse' => $telegramResponse,
                    'error' => '',
                ];
            }
        } catch (\Exception $e) {
            // Handle the exception
            return [
                'response' => '',
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
    private function getUserType()
        {
            // ==>> Get Data from Auth App for User object
            $user = auth()->user();
            if ($user->type_id == 2) { //
                $role = 'Staff';
            } else {
                $role = 'Admin';
            }
            return $role;
        }

}
