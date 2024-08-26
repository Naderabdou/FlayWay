<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\LanguageStudy;
use App\Models\CustomerReview;
use App\Models\Setting;
use App\Models\StudyDestination;
use App\Models\TouristDestination;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__('Total Services'), Service::count())
                ,
            Stat::make(__('Total Language Study'), LanguageStudy::count()),
            Stat::make(__('Total Study Destination'), StudyDestination::count()),
            Stat::make(__('Total Tourist Destination'), TouristDestination::count()),
            Stat::make(__('Total Contact'), Contact::count()),
            Stat::make(__('Total Customer Review'), CustomerReview::count()),
            Stat::make(__('Total Services Orders'), ServiceOrder::count()),
            Stat::make(__('Total Settings'), Setting::count()),



        ];
    }
}
