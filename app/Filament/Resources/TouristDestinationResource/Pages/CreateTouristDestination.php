<?php

namespace App\Filament\Resources\TouristDestinationResource\Pages;

use App\Filament\Resources\TouristDestinationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTouristDestination extends CreateRecord
{
    protected static string $resource = TouristDestinationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return __('Tourist Destination Created Successfully');
    }
}
