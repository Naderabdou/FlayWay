<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\LanguageStudy;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LanguageStudyResource\Pages;
use App\Filament\Resources\LanguageStudyResource\RelationManagers;
use Filament\Actions\RestoreAction;

class LanguageStudyResource extends Resource
{
    protected static ?string $model = LanguageStudy::class;
    public static function getNavigationGroup(): ?string
    {
        return __('Language and services Data');
    }
    protected static ?string $navigationIcon = 'heroicon-o-language';

    public static function getModelLabel(): string
    {
        return __('Language Study');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Language Studies');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Main Information'))
                        ->description(__('This is the main information about the Language Study.'))
                        ->collapsible(true)
                        ->schema([
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
                                }),
                            TextInput::make('slug')
                                ->required()
                                ->autofocus()

                                ->unique(LanguageStudy::class, 'slug', ignoreRecord: true)
                                ->disabled()
                                ->dehydrated(),

                        ])->columns(3),


                    Section::make(__('Description Information'))
                        ->description(__('This is the description information about the Language Study.'))
                        ->collapsible(true)

                        ->schema([

                            Textarea::make('desc_ar')
                                ->label(__('desc_ar'))
                                ->minLength(3)
                                ->autofocus()

                                ->columnSpan(3)
                                ->rows(5)
                                ->required(),


                            Textarea::make('desc_en')
                                ->label(__('desc_en'))
                                ->minLength(3)
                                ->autofocus()

                                ->columnSpan(3)
                                ->rows(5)
                                ->required(),

                        ]),

                    Section::make(__('Images Information'))
                        ->description(__('This is the images information about the Language Study.'))
                        ->collapsible(true)

                        ->schema([



                            FileUpload::make('image')
                                ->label(__('image'))
                                ->image()
                                ->disk('public')->directory('languageStudy')
                                ->columnSpanFull()
                                ->preserveFilenames()
                                ->reorderable()
                                ->autofocus()

                                ->required(),


                            FileUpload::make('attachment')
                                ->translateLabel() // Equivalent to `label(__('Name'))`
                                ->acceptedFileTypes(['application/pdf'])



                                // ->minFiles(1)
                                // ->maxFiles(1)

                                ->disk('public')->directory('languageStudy')
                                ->columnSpanFull()
                                ->preserveFilenames()
                                ->reorderable()
                                ->helperText(__('Upload PDF attachment for the Language Study only'))



                                ->nullable(),
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
                ImageColumn::make('image')
                    ->label(__('image'))
                    ->circular(),
                TextColumn::make('name_' . app()->getLocale())
                    ->searchable()
                    ->label(__('name_' . app()->getLocale())),
                TextColumn::make('desc_' . app()->getLocale())
                    ->searchable()
                    ->label(__('desc_' . app()->getLocale()))
                    ->wrap()
                    ->words(50),





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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),

                ])
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
            'index' => Pages\ListLanguageStudies::route('/'),
            'create' => Pages\CreateLanguageStudy::route('/create'),
            'edit' => Pages\EditLanguageStudy::route('/{record}/edit'),
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
