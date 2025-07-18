<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProduct extends Model
{
    use HasFactory;

    protected $table = "favorite_products";

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }
}
