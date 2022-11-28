<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Product\ProductResource;
use App\Models\Product;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
         return view('product.show', compact('product') );
    }
}
