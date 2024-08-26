<?php

namespace App\Filament\Resources\TouristDestinationResource\Pages;

use App\Filament\Resources\TouristDestinationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTouristDestination extends EditRecord
{
    protected static string $resource = TouristDestinationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return __('Tourist Destination Updated Successfully');
    }
}
