<?php

namespace App\Http\Controllers;

use App\Models\Entities\CartEntity;
use App\Models\Entities\ProductEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsController extends Controller
{
    public function addImages(int $productId)
    {
        $product = ProductEntity::where('id', $productId)->first();
        if (!$product) {
            throw new NotFoundHttpException();
        }

        return view('products.add-images', ['product' => $product]);
    }

    public function uploadImages(Request $request)
    {
        $validated = $request->validate([
            'images' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        var_dump($req->file());exit;
    }
}
