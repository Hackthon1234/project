<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'review',
        'verified_purchase'
    ];

    protected $casts = [
        'verified_purchase' => 'boolean',
        'rating' => 'integer'
    ];

    /**
     * Get the product that owns the review.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user that owns the review.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include verified purchase reviews.
     */
    public function scopeVerifiedPurchase($query)
    {
        return $query->where('verified_purchase', true);
    }

    /**
     * Scope a query to only include reviews with a specific rating.
     */
    public function scopeByRating($query, $rating)
    {
        return $query->where('rating', $rating);
    }
}
