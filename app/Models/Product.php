<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'quantity',
        'images',
    ];
    protected $casts = [
    'image' => 'array',
];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the wishlist items for this product
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Get users who have this product in wishlist
     */
    public function wishlistUsers()
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    /**
     * Check if this product is in user's wishlist
     */
    public function isInWishlist($userId)
    {
        return $this->wishlists()->where('user_id', $userId)->exists();
    }

    /**
     * Get wishlist count for this product
     */
    public function getWishlistCountAttribute()
    {
        return $this->wishlists()->count();
    }
}


