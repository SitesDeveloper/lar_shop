<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;
    protected $table='product_images';
    protected $guarded = false;
    
    public function getImageUrlAttribute()
    {
        return !empty($this->file_path) ?
            url( Storage::url($this->file_path) ) : url( Storage::url('special/no_img.jpg') );
    }

}
