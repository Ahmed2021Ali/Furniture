<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'sub_category_id', 'id', 'price', 'name',
        'description', 'offer',
        'price_after_offer', 'color', 'size'
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /*    public function reviews()
        {
            return $this->hasMany(Review::class)->paginate(5);
        }*/
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('productImages');
    }
}
