<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Mail\FlyMail;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ServiceOrder;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceOrderResource\Pages;
use App\Filament\Resources\ServiceOrderResource\RelationManagers;


class ServiceOrderResource extends Resource
{
    protected static ?string $model = ServiceOrder::class;
    protected static ?int $navigationSort = 9;

    public static function getNavigationGroup(): ?string

    {
        return __('Customer Data');
    }
    public static function getModelLabel(): string
    {
        return __('Service Order');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Service Orders');
    }
    protected static ?string $navigationIcon = 'heroicon-o-server-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('name'))
                    ->required()
                    ->minLength(3)
                    ->autofocus(),


                TextInput::make('email')
                    ->label(__('email'))
                    ->required()
                    ->email(),

                TextInput::make('phone')
                    ->label(__('phone'))
                    ->required()
                    ->minLength(10),
                TextInput::make('whatsapp')
                    ->label(__('whatsapp'))
                    ->required()
                    ->minLength(10),

                TextInput::make('best_contact_method')
                    ->label(__('best_contact_method'))
                    ->required()
                    ->minLength(3),

                TextInput::make('service_name')
                    ->label(__('service_name'))
                    ->required()
                    ->minLength(10),
                Textarea::make('message')
                    ->label(__('message'))
                    ->required()
                    ->columnSpanFull()
                    ->minLength(10),
                Toggle::make('is_replay')
                    ->label(__('isReply'))
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->modifyQueryUsing(function (Builder $query) {
            return $query->latest('created_at');
        })
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__('email'))
                    ->searchable()
                    ->sortable()
                    ->url(fn(ServiceOrder $record) => 'mailto:' . $record->email, true), // Redirect to email


                Tables\Columns\TextColumn::make('phone')
                    ->label(__('phone'))
                    ->searchable()
                    ->sortable()
                    ->url(fn(ServiceOrder $record) => 'tel:' . $record->phone, true), // Redirect to phone

                Tables\Columns\TextColumn::make('whatsapp')
                    ->label(__('whatsapp'))
                    ->searchable()
                    ->sortable()
                    ->url(fn(ServiceOrder $record) => 'https://wa.me/' . $record->whatsapp, true), // Redirect to whatsapp

                Tables\Columns\TextColumn::make('best_contact_method')
                    ->label(__('best_contact_method'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('service_name')
                    ->label(__('service_name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('message')
                    ->label(__('message'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('is_replay')
                    ->label(__('isReply'))
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function (ServiceOrder $record) {
                        return $record->is_replay == 1 ? __('is replied') : __('not replied');
                    })
                    ->color(function (string $state): string {
                        if ($state == '1') {
                            return 'success';
                        } else {
                            return 'danger';
                        }

                    })
                    ->badge(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

                SelectFilter::make('is_replay')
                    ->label(__('filter by Replay'))

                    ->options([
                        '1' => __('is replied'),
                        '0' => __('not replied'),
                    ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
                    ->action(function (ServiceOrder $ServiceOrder, array $data) {


                          Mail::to($ServiceOrder->email)->send(new FlyMail($data));

                        $ServiceOrder->is_replay = 1;
                        $ServiceOrder->save();


                        Notification::make()
                            ->title(__('Reply Sent Successfully'))
                            ->success()
                            ->icon('heroicon-o-inbox')
                            ->iconColor('success')
                            ->send();
                    })->icon('heroicon-o-chat-bubble-left-right')

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceOrders::route('/'),
            'view' => Pages\ViewUser::route('/{record}'),


        ];
    }
}
