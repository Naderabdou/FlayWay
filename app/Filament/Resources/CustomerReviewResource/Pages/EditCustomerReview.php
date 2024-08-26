<?php

namespace App\Filament\Resources\CustomerReviewResource\Pages;

use App\Filament\Resources\CustomerReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerReview extends EditRecord
{
    protected static string $resource = CustomerReviewResource::class;

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
        return __('Review Updated Successfully');
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
