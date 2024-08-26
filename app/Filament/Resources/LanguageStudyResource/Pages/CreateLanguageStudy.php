<?php

namespace App\Filament\Resources\LanguageStudyResource\Pages;

use App\Filament\Resources\LanguageStudyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLanguageStudy extends CreateRecord
{
    protected static string $resource = LanguageStudyResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return __('Language Study Created Successfully');
    }
}
