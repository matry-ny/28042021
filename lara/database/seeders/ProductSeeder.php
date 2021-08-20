<?php

namespace Database\Seeders;

use App\Models\Entities\ProductEntity;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductEntity::factory(1000)->create();
    }
}
