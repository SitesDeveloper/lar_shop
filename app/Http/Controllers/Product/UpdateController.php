<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest  $request, Product $product)
    {
        $data = $request->validated();

        $data['product_images'] = isset($data['product_images']) ? $data['product_images'] : [];
        $productImages = $data['product_images'];
        //dd($productImages);

        if (isset($data['preview_image']) ) {
            $curent_image = $product->preview_image;
            if (!empty($curent_image)) {
                Storage::disk('public')->delete($curent_image);
            }

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $tags = $data['tags'];
        $colors = $data['colors'];
        unset($data['tags'], $data['colors'], $data['product_images']);

        $product->update($data);

        $product->tags()->sync($tags);
        $product->colors()->sync($colors);

        $oldImages = $product->productImages;
        //dd($oldImages->count());

        foreach ($productImages as $k=>$img) {
            if ($k<$oldImages->count()) {
                //dump($k);
                //удаление старого изображения 
                //по индексу порядка на форме
                //dd($oldImages[$k]->file_path);
                Storage::disk('public')->delete($oldImages->get($k)->file_path);
                $old_img_id = $oldImages->get($k)->id;
                ProductImage::destroy($old_img_id);
                //$oldImages[$k]->delete();
            }
            $path = Storage::disk('public')->put('/images', $img);
            ProductImage::create([
                'product_id' => $product->id,
                'file_path' => $path
            ]);
        }



        return redirect()->route('product.index');
    }
}
