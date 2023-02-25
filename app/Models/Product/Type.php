<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;
    protected $table = 'products_type';

    /*
    |--------------------------------------------------------------------------
    | One-To-Many relationship
    |--------------------------------------------------------------------------
    |
    | Also known as the hasMany-relationship, this relationship 
    | defines a relation that 'one type has many other products.
    | Say that a type has many products
    |
    |--------------------------------------------------------------------------
    | Noted:
    |--------------------------------------------------------------------------
    |
    | this->hasOne('Child::class', 'foreign_key', 'local_key');
    | local_key is the primary key of table users_type. We only need to specify it if your primary key is not called id
    |
    */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'type_id');
    }
}
