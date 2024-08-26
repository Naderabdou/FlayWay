<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SEOSettings  extends Settings
{
    public string $meta_title_ar;
    public string $meta_title_en;
    public string $meta_description_ar;
    public string $meta_description_en;
    public array $meta_keywords_ar;  // Updated to array
    public array $meta_keywords_en;  // Updated to array

    public static function group(): string
    {
        return 'seo';
    }
}
