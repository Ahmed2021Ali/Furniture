<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Category extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;

    protected $fillable = ['name'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('categoryImages');
    }
}
