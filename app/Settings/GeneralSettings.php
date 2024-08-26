<?php

namespace App\Settings;

use Mockery\Matcher\Any;
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name_ar;
    public string $site_name_en;
   public string $logo = 'settings/logo.png';
    public string $favicon = 'settings/favicon.png';
    public string $email;
    public string $phone;
    public string $whatsapp;
    public string $whatsapp_hotal;
    public string $website;
    public string $facebook;
    public string $twitter;
    public string $snapchat;
    public string $youtube;
    public string $instagram;
    public string $linkedin;
    public string $address;
    public  string| array $location ;

    public string $meta_title_ar;
    public string $meta_title_en;
    public string $meta_description_ar;
    public string $meta_description_en;
    public array $meta_keywords_ar;  // Updated to array
    public array $meta_keywords_en;  // Updated to array
    public string $about_desc_ar;
    public string $about_desc_en;
    public string $about_image_one;
    public string $about_image_two;
    public string $about_image_three;
    public string $about_image_four;
    public string $expert;
    public string $hotel_desc_ar;
    public string $hotel_desc_en;
    public string $hotel_image_one;
    public string $hotel_image_two;
    public string $hotel_image_three;
    public string $study_offers_desc_ar;
    public string $study_offers_desc_en;
    public string $study_offers_image;
    public string $summer_camp_desc_ar;
    public string $summer_camp_desc_en;
    public string $summer_camp_image;
    public string $university_visa_desc_ar;
    public string $university_visa_desc_en;
    public string $university_visa_image_one;
    public string $university_visa_image_two;
    public string $university_visa_image_three;
    public string $courses_desc_ar;
    public string $courses_desc_en;
    public string $courses_image;
    public string $header_image;
    public string $footer_image;
    public string $header_desc_ar;
    public string $header_desc_en;
    public string $sub_header_desc_ar;
    public string $sub_header_desc_en;
    public string $home_about_desc_en;
    public string $home_about_desc_ar;


    public static function group(): string
    {
        return 'general';
    }
}
