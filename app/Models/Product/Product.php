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


    public function type(): BelongsTo //M:1
    {
        return $this->belongsTo(Type::class, 'type_id','id')->select('id', 'name');
    }
}
