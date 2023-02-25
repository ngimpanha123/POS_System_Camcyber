<?php

namespace App\Http\Controllers\PrintPDF;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class printController extends Controller
{
    function isValidDate($date){
        //echo $date; die;
        if (false === strtotime($date)) {
            return false;
        }else {
            return true;
        }
    }
    public function printInvioceOrder(Request $req)
    {
        return $req->all();
    }
    public function printSale(Request $req,$number = 0)
    {
        $data           = Order::select('id','receipt_number','cashier_id','total_price','ordered_at')
        ->where('receipt_number',$number)
        ->with([
            'cashier',
            'details'
        ]);

        // return $data;
                  

       // ==============================>> Date Range
       if($req->from && $req->to && $this->isValidDate($req->from) && $this->isValidDate($req->to)){
            $data = $data->whereBetween('created_at', [$req->from." 00:00:00", $req->to." 23:59:59"]);
        }
        
        // =========================== Search receipt number
        if( $req->receipt_number && $req->receipt_number !="" ){
            $data = $data->where('receipt_number', $req->receipt_number);
        }

        // ========================== search filter status
        if ($req->receipt_number) {
            $data = $data->where('receipt_number', $req->receipt_number);
        }

        // ===========================>> If Not admin, get only record that this user make order
        $user         = JWTAuth::parseToken()->authenticate();
        if($user->type_id == 2){ //Manager
            $data = $data->where('cashier_id', $user->id); 
        }

        $data = $data->orderBy('id', 'desc')->get();
        
        $total = 0;
        foreach($data as $row){
            $total += $row->total_price;
        } 
        
        $payload = [
            'from'          => $req->from,
            'to'            => $req->to,
            'total'         => $total,
            'data'          => $data,

        ];

        return $payload;
        // return view('printing.sale.sale', $payload);
    }
}
