<?php

namespace App\Filament\Resources\StudyDestinationResource\Pages;

use App\Filament\Resources\StudyDestinationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudyDestination extends EditRecord
{
    protected static string $resource = StudyDestinationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return __('Study Destination Updated Successfully');
    }
}
