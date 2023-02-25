<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Type;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    /*
    |--------------------------------------------------------------------------
    | BelongsTo
    |--------------------------------------------------------------------------
    |
    | Table products belongsto products_type depends on field type_id
    |
    |--------------------------------------------------------------------------
    | Noted:
    |--------------------------------------------------------------------------
    |
    | $this->belongsTo(Parent::class,'foreign_key','owner_key');
    |
    */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id','id')->select('id', 'name');
    }
}
