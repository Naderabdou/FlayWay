<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ContactUsSettings extends Settings
{
    public string $email;
    public string $phone;
    public string $whatsapp;
    public string $website;
    public string $facebook;
    public string $twitter;
    public string $snapchat;
    public string $youtube;
    public string $instagram;
    public string $linkedin;
    public string $address;
    public array $location = ["lat" => 24.7195455, "lng" => 46.6684983];

    public static function group(): string
    {
        return 'contact_us';
    }
}
