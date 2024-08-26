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
use App\Filament\Resources\StudyDestinationResource\Pages;
use App\Filament\Resources\StudyDestinationResource\RelationManagers;

class StudyDestinationResource extends Resource
{
    protected static ?string $model = StudyDestination::class;

    protected static ?string $navigationIcon = 'heroicon-o-strikethrough';
    public static function getNavigationGroup(): ?string
    {
        return __('Destinations Data');
    }
    public static function getModelLabel(): string
    {
        return __('StudyDestination');
    }

    public static function getPluralModelLabel(): string
    {
        return __('StudyDestination');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Study Destination Information'))
                        ->description(__('This is the main information about the study destination.'))
                        ->collapsible(true)
                        ->schema([
                            TextInput::make('name_ar')
                                ->label(__('name_ar'))
                                ->minLength(3)

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
                                ->unique(StudyDestination::class, 'slug', ignoreRecord: true)
                                ->disabled()
                                ->dehydrated(),

                            RichEditor::make('desc_ar')
                                ->label(__('desc_ar'))
                                ->minLength(3)

                                ->columnSpan(3)
                                ->required(),


                            RichEditor::make('desc_en')
                                ->label(__('desc_en'))
                                ->minLength(3)

                                ->columnSpan(3)
                                ->required(),
                        ])->columns(3),


                    Section::make(__('Features Information'))
                        ->description(__('This is the features information about the study destination.'))
                        ->collapsible(true)

                        ->schema([
                            RichEditor::make('features_ar')
                                ->label(__('features_ar'))
                                ->minLength(3)

                                ->fileAttachmentsDirectory('StudyDestination')
                                ->columnSpanFull()
                                ->required(),

                            RichEditor::make('features_en')
                                ->label(__('features_en'))
                                ->minLength(3)

                                ->fileAttachmentsDirectory('StudyDestination')
                                ->columnSpanFull()
                                ->required(),

                        ]),

                    Section::make(__('Images Information'))
                        ->description(__('This is the images information about the study destination.'))
                        ->collapsible(true)

                        ->schema([

                            FileUpload::make('main_image')
                                ->label(__('main_image'))
                                ->image() // Optional: Specify if it's an image
                                ->disk('public') // Specify the disk to use (Graid or another disk)
                                ->columnSpanFull()
                                ->reorderable()

                                ->disk('public')->directory('StudyDestination')
                                ->helperText(__('Upload the main image for the study destination only'))

                                ->preserveFilenames()
                                ->required(),

                            FileUpload::make('image')
                                ->translateLabel() // Equivalent to `label(__('Name'))`

                                ->multiple()
                                ->minFiles(2)
                                ->maxFiles(2)
                                ->image() // Optional: Specify if it's an image
                                ->disk('public')->directory('StudyDestination')
                                ->columnSpanFull()
                                ->preserveFilenames()
                                ->reorderable()
                                ->helperText(__('Upload 2 images for the study destination only'))



                                ->required(),

                                FileUpload::make('attachment')
                                ->translateLabel() // Equivalent to `label(__('Name'))`
                                ->acceptedFileTypes(['application/pdf'])



                                // ->minFiles(1)
                                // ->maxFiles(1)

                                ->disk('public')->directory('StudyDestination')
                                ->columnSpanFull()
                                ->preserveFilenames()
                                ->reorderable()
                                ->helperText(__('Upload PDF attachment for the study destination only'))



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
                ImageColumn::make('main_image')
                    ->label(__('main_image'))
                    ->square(),
                TextColumn::make('name_' . app()->getLocale())
                    ->searchable()
                    ->label(__('name_' . app()->getLocale())),

                TextColumn::make('desc_' . app()->getLocale())
                    ->label(__('desc_' . app()->getLocale()))
                    ->wrap()
                    ->markdown()
                    ->words(50),


                ImageColumn::make('image')
                ->label(__('images'))
                    ->circular()
                    ->stacked(),

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
            'index' => Pages\ListStudyDestinations::route('/'),
            'create' => Pages\CreateStudyDestination::route('/create'),
            'edit' => Pages\EditStudyDestination::route('/{record}/edit'),
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
