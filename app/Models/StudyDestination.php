<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudyDestination extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['features_ar', 'features_en', 'image','name_ar','name_en','slug','desc_ar','desc_en','main_image','attachment'];

    protected $casts = [
        'image' => 'array',
    ];


    protected $appends = ['main_image_path','attachment_path'];


    public function getMainImagePathAttribute()
    {
        return asset('storage/' . $this->main_image);
    }

    public function getFeaturesAttribute()
    {
        return $this['features_' . app()->getLocale()];
    }

    public function getNameAttribute()
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getDescAttribute()
    {
        return $this['desc_' . app()->getLocale()];
    }

    public function getAttachmentPathAttribute()
    {
        return asset('storage/' . $this->attachment);
    }


}
