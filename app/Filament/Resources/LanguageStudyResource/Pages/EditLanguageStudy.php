<?php

namespace App\Filament\Resources\LanguageStudyResource\Pages;

use App\Filament\Resources\LanguageStudyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLanguageStudy extends EditRecord
{
    protected static string $resource = LanguageStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return __('Language Study Updated Successfully');
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
