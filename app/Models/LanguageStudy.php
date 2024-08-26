<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LanguageStudy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'desc_ar',
        'desc_en',
        'image',
        'view',
        'attachment',
    ];



    public function getNameAttribute()
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getDescAttribute()
    {
        return $this['desc_' . app()->getLocale()];
    }

    protected $appends = ['image_path', 'attachment_path'];


    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
    }

    public function getAttachmentPathAttribute()
    {
        return asset('storage/' . $this->attachment);
    }
}
