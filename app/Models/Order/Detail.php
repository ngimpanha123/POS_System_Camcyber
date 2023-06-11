<?php

namespace App\Models\Order;

use App\Models\Product\Product;
use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'orders_detail';


    public function order() //M:1
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product() //M:1
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
