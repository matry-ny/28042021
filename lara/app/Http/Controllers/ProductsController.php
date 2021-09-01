<?php

namespace App\Http\Controllers;

use App\Models\Entities\CartEntity;
use App\Models\Entities\ProductEntity;
use App\Models\Entities\ProductImageEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RuntimeException;
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

    public function uploadImages(Request $request, int $productId)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $dir = "/images/{$productId}/";
        $rout = public_path() . $dir;
        File::ensureDirectoryExists($rout);

        foreach ($request->file('images') as $file) {
            $fileName = time() . '_' . md5($file->getFilename()) . '.' . $file->extension();
            $file->move($rout, $fileName);

            $image = new ProductImageEntity();
            $image->product_id = $productId;
            $image->file_path = $dir . $fileName;
            $image->save();
        }

        return redirect('/');
    }
}
