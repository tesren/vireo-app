<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class UnitType extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    /**
     * Get all of the units for the UnitType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(450)->keepOriginalImageFormat()->nonOptimized()->nonQueued();
        
        $this->addMediaConversion('medium')->width(1280)->keepOriginalImageFormat()->nonOptimized()->nonQueued();
        
        $this->addMediaConversion('large')->width(1920)->keepOriginalImageFormat()->nonOptimized()->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery');
    }
}
