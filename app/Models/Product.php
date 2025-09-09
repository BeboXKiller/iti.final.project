<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    use HasFactory;
protected $fillable=[
'category_id',
'name',
'description',
'price',
'quantity',
'images',
];

public function category()
{
    return $this->belongsTo(Category::class);
}

public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}
}


