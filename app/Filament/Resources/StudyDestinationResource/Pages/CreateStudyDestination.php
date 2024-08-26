<?php

namespace App\Filament\Resources\StudyDestinationResource\Pages;

use App\Filament\Resources\StudyDestinationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudyDestination extends CreateRecord
{
    protected static string $resource = StudyDestinationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return __('Study Destination Created Successfully');
    }
}
