<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Mail\FlyMail;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Tables\Table;
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
use App\Filament\Resources\ContactResource\Pages;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;
    protected static ?int $navigationSort = 6;
    public static function getNavigationGroup(): ?string
    {
        return __('Customer Data');
    }
    protected static ?string $navigationIcon = 'heroicon-o-inbox';
    public static function getModelLabel(): string
    {
        return __('Contact Us');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Contact Us');
    }

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

                Textarea::make('message')
                    ->label(__('message'))
                    ->required()
                    ->columnSpanFull()
                    ->minLength(10),
                    Toggle::make('isReply')
                    ->label(__('isReply'))


            ])
            ->columns(3);
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
                    ->url(fn (Contact $record) => 'mailto:' . $record->email, true), // Redirect to email


                Tables\Columns\TextColumn::make('phone')
                    ->label(__('phone'))
                    ->searchable()
                    ->sortable()
                    ->url(fn (Contact $record) => 'tel:' . $record->phone, true), // Redirect to phone


                Tables\Columns\TextColumn::make('message')
                    ->label(__('message'))
                    ->searchable()
                    ->words(50)
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('isReply')
                    ->label(__('isReply'))
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function (Contact $record) {
                        return $record->isReply == 1 ? __('is replied') : __('not replied');
                    })
                    ->color(fn(string $state): string => match ($state) {


                        '1' => 'success',
                        '0' => 'danger',
                    })
                    ->badge(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),



            ])
            ->filters([


                SelectFilter::make('isReply')
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
                    ->action(function (Contact $contact, array $data) {


                       Mail::to($contact->email)->send(new FlyMail($data));

                        $contact->isReply = 1;
                        $contact->save();


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
            'index' => Pages\ListContacts::route('/'),
            'view' => Pages\ViewUser::route('/{record}'),

        ];
    }
}
