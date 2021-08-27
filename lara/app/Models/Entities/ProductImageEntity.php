<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $product_id
 * @property string $file_path
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ProductEntity $product
 */
class ProductImageEntity extends Model
{
    protected $table = 'product_images';

    public function product(): HasOne
    {
        return $this->hasOne(ProductEntity::class, 'id', 'product_id');
    }
}
