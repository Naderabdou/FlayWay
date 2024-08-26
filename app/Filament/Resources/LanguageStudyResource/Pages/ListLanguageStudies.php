<?php

namespace App\Filament\Resources\LanguageStudyResource\Pages;

use App\Filament\Resources\LanguageStudyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLanguageStudies extends ListRecords
{
    protected static string $resource = LanguageStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
