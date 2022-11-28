<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tags = $data['tags'];
        $colors = $data['colors'];
        unset($data['tags'], $data['colors']);

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

        return redirect()->route('product.index');
    }
}
