<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\StudyDestination;
use Filament\Resources\Resource;
use App\Models\TouristDestination;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TouristDestinationResource\Pages;
use App\Filament\Resources\TouristDestinationResource\RelationManagers;

class TouristDestinationResource extends Resource
{
    protected static ?string $model = TouristDestination::class;
    public static function getNavigationGroup(): ?string
    {
        return __('Destinations Data');
    }
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function getModelLabel(): string
    {
        return __('TouristDestination');
    }

    public static function getPluralModelLabel(): string
    {
        return __('TouristDestinations');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Tourist Destination Information'))
                        ->description(__('This is the main information about the tourist destination.'))
                        ->collapsible(true)
                        ->schema([
                            Grid::make()->schema([
                                TextInput::make('name_ar')
                                    ->label(__('name_ar'))
                                    ->minLength(3)
                                    ->maxLength(255)

                                    ->autofocus()
                                    ->required(),

                                TextInput::make('name_en')
                                    ->required()
                                    ->label(__('name_en'))
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->autofocus()
                                    ->lazy()
                                    ->afterStateUpdated(function (Set $set, ?string $state) {
                                        $set('slug', str()->slug($state));
                                    })

                                    ->maxLength(255),



                                TextInput::make('slug')
                                    ->required()
                                    ->unique(TouristDestination::class, 'slug', ignoreRecord: true)
                                    ->disabled()
                                    ->autofocus()
                                    ->dehydrated(),

                            ])->columns(3),


                            TextInput::make('sub_title_ar')
                                ->label(__('sub_title_ar'))
                                ->minLength(3)
                                ->maxLength(255)

                                ->columnSpan(2)
                                ->required(),

                            TextInput::make('sub_title_en')
                                ->label(__('sub_title_en'))
                                ->minLength(3)
                                ->maxLength(255)

                                ->columnSpan(2)

                                ->required(),


                            TextInput::make('price')
                                ->label(__('Price'))
                                ->required()
                                ->numeric()
                                ->minValue(1)
                                ->minLength(3)


                                ->columnSpan(2)
                                ->prefix(__('SAR')),

                            TextInput::make('rate')
                                ->label(__('rate'))
                                ->columnSpan(2)
                                ->integer() // or
                                ->minValue(1)
                                ->maxValue(5)

                                ->required(),




                            // Textarea::make('desc_ar')
                            //     ->label(__('desc_ar'))
                            //     ->columnSpan(2)
                            //     ->rows(5)
                            //     ->columnSpan(2)
                            //     ->minLength(3)


                            //     ->required(),


                            // Textarea::make('desc_en')
                            //     ->label(__('desc_en'))
                            //     ->columnSpan(2)
                            //     ->rows(5)
                            //     ->minLength(3)

                            //     ->required(),
                        ])->columns(4),


                    Section::make(__('Includes and Excludes Information'))
                        ->description(__('This is the includes and excludes information about the tourist destination.'))
                        ->collapsible(true)

                        ->schema([
                            RichEditor::make('includes_ar')
                                ->label(__('includes_ar'))
                                ->minLength(3)

                                ->fileAttachmentsDirectory('TouristDestination')
                                ->required(),

                            RichEditor::make('includes_en')
                                ->label(__('includes_en'))
                                ->minLength(3)

                                ->fileAttachmentsDirectory('TouristDestination')
                                ->required(),
                            RichEditor::make('excludes_ar')
                                ->label(__('excludes_ar'))
                                ->minLength(3)

                                ->fileAttachmentsDirectory('TouristDestination')
                                ->required(),

                            RichEditor::make('excludes_en')
                                ->label(__('excludes_en'))
                                ->minLength(3)

                                ->fileAttachmentsDirectory('TouristDestination')
                                ->required(),

                        ])->columns(2),

                    Section::make(__('Images Information'))
                        ->description(__('This is the images information about the tourist destination.'))
                        ->collapsible(true)

                        ->schema([

                            FileUpload::make('main_image')
                                ->label(__('main_image'))
                                ->image() // Optional: Specify if it's an image
                                ->disk('public') // Specify the disk to use (Graid or another disk)
                                ->columnSpanFull()
                                ->disk('public')->directory('TouristDestination')
                                ->helperText(__('Upload the main image for the tourist destination only'))

                                ->preserveFilenames()
                                ->reorderable()

                                ->required(),

                            FileUpload::make('image')
                            ->translateLabel() // Equivalent to `label(__('Name'))`
                            ->multiple()
                                ->maxFiles(4)
                                ->minFiles(4)
                                ->image() // Optional: Specify if it's an image
                                ->disk('public')->directory('TouristDestination')
                                ->columnSpanFull()
                                ->helperText(__('Upload 4 images for the tourist destination only'))

                                ->preserveFilenames()
                                ->reorderable()

                                ->required(),
                        ]),




                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->latest('created_at');
            })
            ->columns([
                ImageColumn::make('main_image')
                    ->label(__('main_image'))
                    ->circular(),
                TextColumn::make('name_' . app()->getLocale())
                    ->searchable()
                    ->label(__('name_' . app()->getLocale())),


                TextColumn::make('sub_title_' . app()->getLocale())
                    ->searchable()
                    ->label(__('sub_title_' . app()->getLocale())),

                ImageColumn::make('image')
                    ->label(__('images'))
                    ->circular()
                    ->stacked(),


                TextColumn::make('price')
                    ->searchable()
                    ->label(__('Price')),
                TextColumn::make('rate')
                    ->searchable()
                    ->label(__('rate')),




                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),

                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListTouristDestinations::route('/'),
            'create' => Pages\CreateTouristDestination::route('/create'),
            'edit' => Pages\EditTouristDestination::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
