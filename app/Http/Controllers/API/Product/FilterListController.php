<?php

namespace App\Http\Controllers\API\Product;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\IndexProductResource;

class FilterListController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $colors = Color::all();
        $tags = Tag::all();

        $maxPrice = Product::max('price'); //Product::orderBy('price','DESC')->first()->price;
        $minPrice = Product::min('price'); //Product::orderBy('price','ASC')->first()->price;

        $products = Product::all();

        $result = [
            'categories' => $categories,
            'colors' => $colors,
            'tags' => $tags,
            'price' => [
                'min' => $minPrice,
                'max' => $maxPrice
            ]
        ];

        return response()->json($result);
    }
}
