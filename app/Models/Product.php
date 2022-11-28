<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Color;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }

    public function getImageUrlAttribute()
    {
        return !empty($this->preview_image) ?
            Storage::url($this->preview_image) : Storage::url('special/no_img.jpg');
    }

//    public function delete()
//    {
//        $this->tags()->detach();
//        $this->colors()->detach();
//
//        return parent::delete();
//    }

}
