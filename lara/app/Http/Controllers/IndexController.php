<?php

namespace App\Http\Controllers;

use App\Models\Entities\CartEntity;
use App\Models\Entities\ProductEntity;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'products' => ProductEntity::paginate(20, ['*'], 'productsPage'),
            'cart' => CartEntity::where('user_id', Auth::user()->id)
                ->orderBy('created_at')
                ->paginate(20, ['*'], 'cartPage'),
        ]);
    }
}
