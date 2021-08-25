<?php

namespace App\Http\Controllers;

use App\Models\Entities\ProductEntity;

class IndexController extends Controller
{
    public function index()
    {
        $products = ProductEntity::paginate(20);
        return view('index', ['products' => $products]);
    }
}
