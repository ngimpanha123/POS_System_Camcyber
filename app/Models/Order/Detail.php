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

    /*
    |--------------------------------------------------------------------------
    | BelongsTo
    |--------------------------------------------------------------------------
    |
    | Table orders_detail belongsto orders depends on field order_id
    |
    |--------------------------------------------------------------------------
    | Noted:
    |--------------------------------------------------------------------------
    |
    | $this->belongsTo(Parent::class,'foreign_key','owner_key');
    |
    */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /*
    |--------------------------------------------------------------------------
    | BelongsTo
    |--------------------------------------------------------------------------
    |
    | Table orders_detail belongsto products depends on field product_id
    |
    |--------------------------------------------------------------------------
    | Noted:
    |--------------------------------------------------------------------------
    |
    | $this->belongsTo(Parent::class,'foreign_key','owner_key');
    |
    */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
