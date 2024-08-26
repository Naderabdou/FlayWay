<?php

namespace App\Filament\Resources\TouristDestinationResource\Pages;

use App\Filament\Resources\TouristDestinationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTouristDestinations extends ListRecords
{
    protected static string $resource = TouristDestinationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
