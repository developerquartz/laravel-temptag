<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'product_name',
        'product_quantity',
        'product_price',
        'product_specification',
        'product_description',
        'product_features',
        'product_feature_image',
        'additional_images',
    ];
}
