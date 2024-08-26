<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use App\Filament\Pages\Dashboard;
use App\Settings\GeneralSettings;
use Filament\Support\Colors\Color;
use App\Filament\Pages\DashboardPage;
use App\Filament\Widgets\StatsOverview;
use Filament\Navigation\NavigationGroup;
use App\Filament\Pages\Settings\Settings;
use Filament\Http\Middleware\Authenticate;
use Filament\FontProviders\GoogleFontProvider;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Outerweb\FilamentSettings\Filament\Plugins\FilamentSettingsPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName(function () {
                $locale = app()->getLocale();
                $property = 'site_name_' . $locale;
                return app(GeneralSettings::class)->$property;
            })

            ->brandLogo(fn () => view('filament.admin.logo'))

            // ->brandLogo(asset('storage/'. app(GeneralSettings::class)->logo))
            ->brandLogoHeight('3rem')

            ->favicon(asset('storage/'. app(GeneralSettings::class)->favicon))



            ->profile(isSimple: false)
            ->databaseNotifications(true)

            ->colors([
                'primary' => [
                    50 => '238, 242, 255',
                    100 => '224, 231, 255',
                    200 => '199, 210, 254',
                    300 => '165, 180, 252',
                    400 => '129, 140, 248',
                    500 => '99, 102, 241',
                    600 => '79, 70, 229',
                    700 => '67, 56, 202',
                    800 => '55, 48, 163',
                    900 => '49, 46, 129',
                    950 => '30, 27, 75',
                ],
                // 'primary' => [
                //     50 => '255, 245, 238',
                //     100 => '255, 230, 224',
                //     200 => '254, 205, 199',
                //     300 => '252, 170, 165',
                //     400 => '248, 130, 129',
                //     500 => '241, 99, 99',
                //     600 => '229, 70, 70',
                //     700 => '202, 56, 56',
                //     800 => '163, 48, 48',
                //     900 => '129, 46, 46',
                //     950 => '75, 27, 27',
                // ],
                // 'primary' => [
                //     50 => '255, 255, 255',  // White
                //     100 => '240, 240, 240', // Light Gray
                //     200 => '220, 220, 220', // Gray
                //     300 => '200, 200, 200', // Darker Gray
                //     400 => '180, 180, 180', // Even Darker Gray
                //     500 => '160, 160, 160', // Dark Gray
                //     600 => '140, 140, 140', // Darker Gray
                //     700 => '120, 120, 120', // Even Darker Gray
                //     800 => '100, 100, 100', // Very Dark Gray
                //     900 => '80, 80, 80',    // Almost Black
                //     950 => '60, 60, 60',    // Darker Almost Black
                // ],
                //                 'primary' => [
                //     50 => '240, 255, 244',  // Light Green
                //     100 => '220, 255, 230', // Lighter Green
                //     200 => '180, 255, 200', // Light Green
                //     300 => '140, 255, 170', // Green
                //     400 => '100, 255, 140', // Bright Green
                //     500 => '60, 255, 110',  // Bright Green
                //     600 => '40, 220, 90',   // Darker Green
                //     700 => '30, 180, 70',   // Even Darker Green
                //     800 => '20, 140, 50',   // Very Dark Green
                //     900 => '10, 100, 30',   // Almost Dark Green
                //     950 => '5, 60, 15',     // Darker Almost Dark Green
                // ],
                // 'primary' => [
                //     50 => '240, 255, 244',  // Light Green
                //     100 => '220, 255, 230', // Lighter Green
                //     200 => '180, 255, 200', // Light Green
                //     300 => '140, 255, 170', // Green
                //     400 => '100, 255, 140', // Bright Green
                //     500 => '60, 255, 110',  // Bright Green
                //     600 => '40, 220, 90',   // Darker Green
                //     700 => '30, 180, 70',   // Even Darker Green
                //     800 => '20, 140, 50',   // Very Dark Green
                //     900 => '10, 100, 30',   // Almost Dark Green
                //     950 => '5, 60, 15',     // Darker Almost Dark Green
                // ],
                // 'primary' => [
                //     50 => '255, 249, 196',  // Light Yellow
                //     100 => '255, 245, 157', // Lighter Yellow
                //     200 => '255, 241, 118', // Light Yellow
                //     300 => '255, 238, 88',  // Medium Yellow
                //     400 => '255, 235, 59',  // Medium Dark Yellow
                //     500 => '253, 216, 53',  // Dark Yellow
                //     600 => '251, 192, 45',  // Darker Yellow
                //     700 => '249, 168, 37',  // Even Darker Yellow
                //     800 => '245, 127, 23',  // Very Dark Yellow
                //     900 => '255, 111, 0',   // Almost Orange Yellow
                //     950 => '255, 87, 34',   // Darker Almost Orange Yellow
                // ],
            ])
            ->font('Inter', provider: GoogleFontProvider::class)
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                DashboardPage::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class

            ])
            ->tenantMiddleware([

                \Hasnayeen\Themes\Http\Middleware\SetTheme::class
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
          //  ->sidebarWidth('20rem')
            ->plugins([
                \Hasnayeen\Themes\ThemesPlugin::make()
            ]);
    }
}
