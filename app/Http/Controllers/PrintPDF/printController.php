<?php

namespace App\Http\Controllers\PrintPDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order\Order;
use Tymon\JWTAuth\Facades\JWTAuth;

class printController extends Controller
{

        public function printInvioceOrder($receipt_number = 0)
        {
            //return $this->getData($receipt_number);
            $header = array(
                'Accept: application/json',
                'Authorization: Basic U29uZ2hhazowMTIyNjM1NjI=',
                'Content-Type: application/json',
                'Cookie: render-complete=true'
            );
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://songhak.jsreportonline.net/api/report',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($this->getData($receipt_number)),
                CURLOPT_HTTPHEADER => $header,
            ));

            $response = curl_exec($curl);
            $error = curl_error($curl);
            curl_close($curl);

            return [
                'file_base64' => base64_encode($response),
                'error' => $error
            ];
        }

        public static function getData($receipt_number = 0)
        {
            $data  = Order::select('id', 'receipt_number', 'cashier_id', 'total_price', 'ordered_at')
                ->where('receipt_number', $receipt_number)
                ->with([
                    'cashier',
                    'details'

                ]);

            $data = $data->orderBy('id', 'desc')->get();

            $total = 0;
            foreach ($data as $row) {
                $total += $row->total_price;
            }

            $payload = [
                'total'         => $total,
                'data'          => $data,

            ];
            $template = [
                "template" => [
                    "name" => "/POS-Order/POS-Inovice",
                ],
                "data" => $payload,
            ];
            return $template;
        }
    }
