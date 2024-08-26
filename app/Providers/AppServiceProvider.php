<?php

namespace App\Providers;

use App\Models\LanguageStudy;
use App\Models\Service;
use App\Models\Setting;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar', 'en']); // also accepts a closure
        });

        $setting = app(GeneralSettings::class);
        $services = Service::all();
        $language = LanguageStudy::all();

        $composeViewWithSettings = function ($view) use ($setting, $language) {
            $view->with('setting', $setting)
            ->with('language', $language);
        };

        $composeViewWithSettingsAndServices = function ($view) use ($setting, $services, $language) {
            $view->with('setting', $setting)
            ->with('language', $language)

                ->with('services', $services);
        };


        // dd($setting);
        // Views that only need the setting
        view()->composer('site.layouts.navbar', $composeViewWithSettings);
        view()->composer('site.contactUs.index', $composeViewWithSettings);

        // Views that need both the setting and services
        view()->composer('site.layouts.footer', $composeViewWithSettingsAndServices);
        // view()->composer('site.home', $composeViewWithSettingsAndServices);
        // view()->composer('site.about', $composeViewWithSettings);
        // view()->composer('site.services', $composeViewWithSettingsAndServices);
        // view()->composer('site.hotel', $composeViewWithSettingsAndServices);
        // view()->composer('site.hotel', $composeViewWithSettingsAndServices);
        // view()->composer('site.layouts.seo', $composeViewWithSettings);
    }
}
