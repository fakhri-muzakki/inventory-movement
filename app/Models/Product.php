<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        "category_id",
        "supplier_id",
        "name",
        "sku",
        "stock",
        "minimum_stock",
        "price",
        'image_url',
        'image_public_id',
        "is_active",
    ];

    protected static function booted(): void
    {
        static::creating(function (Product $product) {

            $nextId = Product::count() + 1;

            $product->sku = 'PRD-' . str_pad(
                $nextId,
                6,
                '0',
                STR_PAD_LEFT
            );
        });
        //         static::created(function (Product $product) {
        //     $product->update([
        //         'sku' => 'PRD-' . str_pad(
        //             $product->id,
        //             6,
        //             '0',
        //             STR_PAD_LEFT
        //         ),
        //     ]);
        // });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
}
