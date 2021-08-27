<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $quantity
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ProductEntity $product
 * @property UserEntity $user
 */
class CartEntity extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(ProductEntity::class, 'id', 'product_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(UserEntity::class, 'id', 'user_id');
    }
}
