<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Color;
use App\Models\Group;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
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
            url( Storage::url($this->preview_image) ) : url( Storage::url('special/no_img.jpg') );
    }

//    public function delete()
//    {
//        $this->tags()->detach();
//        $this->colors()->detach();
//
//        return parent::delete();
//    }

}
