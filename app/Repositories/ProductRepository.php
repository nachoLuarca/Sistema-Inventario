<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function count()
    {
        return Product::count();
    }
}
