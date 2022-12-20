<?php

namespace App\Http\Controllers\Product;

use App\Models\Tag;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;


class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $groups = Group::all();

        return view('product.edit', compact( 'product','tags', 'colors', 'categories', 'groups'));
    }
}
