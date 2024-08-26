<?php

namespace App\Filament\Resources\ServiceOrderResource\Pages;

use Filament\Actions;
use App\Models\ServiceOrder;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\ServiceOrderResource;

class ViewUser extends ViewRecord
{
    protected static string $resource = ServiceOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Send Reply')
                ->label(__('Send Reply'))
                ->form([
                    Textarea::make('reply')
                        ->label(__('Reply'))
                        ->minLength(3)

                        ->columnSpan(3)
                        ->rows(5)
                        ->required(),
                ])
                ->action(function (ServiceOrder $contact, array $data) {

                    // Mail::to($contact->email)->send(new FlyMail($data));

                    $contact->is_replay = 1;
                    $contact->save();


                    Notification::make()
                        ->title(__('Reply Sent Successfully'))
                        ->success()

                        ->send();
                })->icon('heroicon-o-chat-bubble-left-right')
        ];
    }
}
