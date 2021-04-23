<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    function categories()
    {
        $this->belongsTo(Category::class);
    }
    protected $fillable=[ 'name',
    'slug' ,
    'details',
    'price',
    'shipping_cost',
    'description',
    'category_id',
    'brand_id',
    'image_path', ];



}
