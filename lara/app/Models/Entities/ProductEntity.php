<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property float $price
 * @property string $description
 * @property int $quantity
 * @property float $weight
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ProductImageEntity[] $images
 */
class ProductEntity extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function images(): HasMany
    {
        return $this->hasMany(ProductImageEntity::class, 'product_id', 'id');
    }
}
