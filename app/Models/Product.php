<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'discounted_price',
        'photopath',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the reviews for the product.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the wishlists for the product.
     */
    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Get the average rating for the product.
     */
    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    /**
     * Get the total number of reviews for the product.
     */
    public function totalReviews()
    {
        return $this->reviews()->count();
    }

    /**
     * Get rating distribution (count of each rating 1-5).
     */
    public function ratingDistribution()
    {
        $distribution = [];
        for ($i = 1; $i <= 5; $i++) {
            $distribution[$i] = $this->reviews()->where('rating', $i)->count();
        }
        return $distribution;
    }

    /**
     * Check if user can review this product.
     */
    public function canUserReview($userId)
    {
        // Check if user has purchased this product
        $hasPurchased = Order::where('user_id', $userId)
            ->where('product_id', $this->id)
            ->exists();

        // Check if user has already reviewed this product
        $hasReviewed = $this->reviews()->where('user_id', $userId)->exists();

        return !$hasReviewed; // Allow review whether purchased or not, but only once
    }
}
