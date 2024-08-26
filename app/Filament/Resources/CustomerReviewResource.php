<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CustomerReview;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CustomerReviewResource\Pages;
use App\Filament\Resources\CustomerReviewResource\RelationManagers;

class CustomerReviewResource extends Resource
{
    public static function getNavigationGroup(): ?string
    {
        return __('Customer Data');
    }
    protected static ?string $model = CustomerReview::class;
    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function getModelLabel(): string
    {
        return __('Customer Review');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Customer Reviews');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Customer Review Information'))
                        ->description(__('This is the main information about the customer review.'))
                        ->collapsible(true)
                        ->schema([
                            TextInput::make('name_ar')
                                ->label(__('name_ar'))
                                ->minLength(3)
                                ->maxLength(255)


                                ->required(),

                            TextInput::make('name_en')
                                ->required()
                                ->label(__('name_en'))
                                ->minLength(3)
                                ->maxLength(255)

                                ->autofocus(),


                            TextInput::make('rating')
                                ->label(__('rating'))
                                ->autofocus()
                                ->minLength(1)
                                ->maxLength(5)
                                ->integer() // or

                                ->required(),



                        ])->columns(3),


                    Section::make(__('Review Information'))
                        ->description(__('This is the main information about the review.'))
                        ->collapsible(true)

                        ->schema([

                            Textarea::make('review_ar')
                                ->label(__('review_ar'))
                                ->minLength(3)
                                ->autofocus()

                                ->rows(5)
                                ->required(),


                            Textarea::make('review_en')
                                ->label(__('review_en'))
                                ->minLength(3)
                                ->autofocus()

                                ->rows(5)
                                ->required(),

                        ])->columns(2),

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
                Tables\Columns\TextColumn::make('name_'.app()->getLocale())
                    ->label(__('name_'.app()->getLocale()))
                    ->searchable()
                    ->sortable(),



                Tables\Columns\TextColumn::make('rating')
                    ->label(__('rating'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('review_'.app()->getLocale())
                    ->label(__('review_'.app()->getLocale()))
                    ->searchable()
                    ->words(50)
                    ->wrap()

                    ->sortable(),


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
            'index' => Pages\ListCustomerReviews::route('/'),
            'create' => Pages\CreateCustomerReview::route('/create'),
            'edit' => Pages\EditCustomerReview::route('/{record}/edit'),
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
