<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Color;
use App\Models\Tag;
use App\Models\Category;


class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();

        return view('product.edit', compact( 'product','tags', 'colors', 'categories'));
    }
}
