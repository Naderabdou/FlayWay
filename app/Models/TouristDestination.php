<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TouristDestination extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'sub_title_ar',
        'sub_title_en',
        'price',
        'rate',
        'includes_ar',
        'includes_en',
        'excludes_ar',
        'excludes_en',
        'image',
        'main_image',
        'slug',

        // 'status',
    ];
    protected $casts = [
        'image' => 'array',
    ];

    public function getNameAttribute()
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getSubTitleAttribute()
    {
        return $this['sub_title_' . app()->getLocale()];
    }

    public function getIncludesAttribute()
    {
        return $this['includes_' . app()->getLocale()];
    }

    public function getExcludesAttribute()
    {
        return $this['excludes_' . app()->getLocale()];
    }
    protected $appends = ['main_image_path'];


    public function getMainImagePathAttribute()
    {
        return asset('storage/' . $this->main_image);
    }

}
