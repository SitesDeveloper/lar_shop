<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $productImages = $data['product_images'];
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tags = $data['tags'];
        $colors = $data['colors'];
        unset($data['tags'], $data['colors'],$data['product_images']);

        $product = Product::FirstOrCreate([
            'title'=>$data['title']
        ], $data);

        foreach($tags as $tagId) {
            ProductTag::FirstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagId,
            ]);
        }

        foreach($colors as $colorId) {
            ProductColor::FirstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorId,
            ]);
        }

        foreach ($productImages as $img) {
            $curImages = ProductImage::where('product_id', $product->id)->get();
            if (count($curImages)>=3) 
                break;
            $path = Storage::disk('public')->put('/images', $img);
            ProductImage::create([
                'product_id' => $product->id,
                'file_path' => $path
            ]);
        }

        return redirect()->route('product.index');
    }
}
