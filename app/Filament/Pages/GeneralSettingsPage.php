<?php

namespace App\Filament\Pages;

use Closure;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Form;
use App\Rules\EamilDomains;
use Filament\Pages\SettingsPage;
use App\Settings\GeneralSettings;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;

class GeneralSettingsPage extends SettingsPage
{
    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 7;
    public static function getNavigationLabel(): string
    {
        return __('Settings');
    }

    // chane the title of the page
    public function getTitle(): string
    {
        return __('Settings');
    }
    protected static string $settings = GeneralSettings::class;


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Settings')
                    ->tabs([
                        Tabs\Tab::make(__('General'))
                            ->icon('heroicon-o-cog-6-tooth')
                            ->badge(4)
                            ->schema([
                                TextInput::make('site_name_ar')
                                    ->label(__('Site Name (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('site_name_en')
                                    ->label(__('Site Name (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                FileUpload::make('logo')
                                    ->label(__('Logo'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->reorderable()
                                    ->required(),

                                FileUpload::make('favicon')
                                    ->label(__('Favicon'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->reorderable()
                                    ->required(),
                                Textarea::make('header_desc_ar')
                                    ->label(__('Header Description (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->rows(5)
                                    ->required(),
                                Textarea::make('header_desc_en')
                                    ->label(__('Header Description (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->rows(5)
                                    ->required(),
                                Textarea::make('sub_header_desc_ar')
                                    ->label(__('Sub Header Description (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                Textarea::make('sub_header_desc_en')
                                    ->label(__('Header Description (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                Textarea::make('home_about_desc_ar')
                                    ->label(__('About Description (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->rows(5)
                                    ->required(),
                                Textarea::make('home_about_desc_en')
                                    ->label(__('About Description (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->rows(5)

                                    ->required(),
                                FileUpload::make('header_image')
                                    ->label(__('header_image'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->reorderable()
                                    ->required(),

                                FileUpload::make('footer_image')
                                    ->label(__('footer_image'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->reorderable()
                                    ->required()
                            ])->columns(2),
                        Tabs\Tab::make(__('Contact Details'))
                            ->icon('heroicon-o-at-symbol')
                            ->badge(11)
                            ->schema([
                                TextInput::make('email')
                                    ->label(__('Email'))
                                    ->autofocus()
                                    ->email()
                                    ->rule([new EamilDomains()])
                                    ->minLength(3)
                                    ->required(),
                                TextInput::make('phone')
                                    ->label(__('Phone'))
                                    ->autofocus()
                                    ->maxLength(15)
                                    ->required(),
                                TextInput::make('whatsapp')
                                    ->label(__('whatsapp Study Abroad'))
                                    ->autofocus()
                                    ->maxLength(20)
                                    ->required(),
                                    TextInput::make('whatsapp_hotal')
                                    ->label(__('whatsapp hotal and reservation'))
                                    ->autofocus()
                                    ->maxLength(20)
                                    ->required(),

                                TextInput::make('website')
                                    ->label(__('website'))
                                    ->autofocus()
                                    ->url()
                                    ->required(),
                                TextInput::make('facebook')
                                    ->label(__('facebook'))
                                    ->autofocus()
                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $facebookUrlPattern = '/^(https?:\/\/)?(www\.)?facebook\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($facebookUrlPattern, $value)) {
                                    //             $fail(__('The Facebook URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('twitter')
                                    ->label(__('twitter'))
                                    ->autofocus()
                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $twitterUrlPattern = '/^(https?:\/\/)?(www\.)?twitter\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($twitterUrlPattern, $value)) {
                                    //             $fail(__('The Twitter URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('snapchat')
                                    ->label(__('snapchat'))
                                    ->autofocus()
                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $snapchatUrlPattern = '/^(https?:\/\/)?(www\.)?snapchat\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($snapchatUrlPattern, $value)) {
                                    //             $fail(__('The Snapchat URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('youtube')
                                    ->label(__('youtube'))
                                    ->autofocus()
                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $youtubeUrlPattern = '/^(https?:\/\/)?(www\.)?youtube\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($youtubeUrlPattern, $value)) {
                                    //             $fail(__('The YouTube URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('instagram')
                                    ->label(__('instagram'))
                                    ->autofocus()
                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $instagramUrlPattern = '/^(https?:\/\/)?(www\.)?instagram\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($instagramUrlPattern, $value)) {
                                    //             $fail(__('The Instagram URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('linkedin')
                                    ->label(__('linkedin'))
                                    ->autofocus()
                                    ->columnSpanFull()

                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $linkedinUrlPattern = '/^(https?:\/\/)?(www\.)?linkedin\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($linkedinUrlPattern, $value)) {
                                    //             $fail(__('The Linkedin URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('address')
                                    ->label(__('Address'))
                                    ->autofocus()
                                    ->placeholder('Enter your address')
                                    ->required()
                                    ->columnSpanFull()
                                    ->maxLength(255),
                                Map::make('location')
                                    ->hiddenLabel()
                                    ->columnSpanFull()

                                    ->mapControls([
                                        'mapTypeControl'    => true,
                                        'scaleControl'      => true,
                                        'rotateControl'     => true,
                                        'fullscreenControl' => true,
                                        'searchBoxControl'  => false, // creates geocomplete field inside map
                                        'zoomControl'       => false,
                                    ])
                                    ->height(fn() => '400px') // map height (width is controlled by Filament options)
                                    ->defaultZoom(5) // default zoom level when opening form
                                    ->autocomplete('address') // field on form to use as Places geocompletion field
                                    ->draggable(false) // allow dragging to move marker

                                    ->clickable(false) // allow clicking to move marker

                            ])->columns(2),
                        Tabs\Tab::make(__('SEO'))
                            ->icon('heroicon-o-globe-europe-africa')
                            ->badge(6)
                            ->schema([
                                TextInput::make('meta_title_ar')
                                    ->label(__('Meta Title (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('meta_title_en')
                                    ->label(__('Meta Title (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                Textarea::make('meta_description_ar')
                                    ->label(__('Meta Description (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->rows(5)
                                    ->required(),
                                Textarea::make('meta_description_en')
                                    ->label(__('Meta Description (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->rows(5)
                                    ->required(),
                                TagsInput::make('meta_keywords_ar')
                                    ->label(__('Meta Keywords (Arabic)'))
                                    ->reorderable()

                                    ->required(),
                                TagsInput::make('meta_keywords_en')
                                    ->label(__('Meta Keywords (English)'))
                                    ->reorderable()

                                    ->required(),
                            ])->columns(2),
                        Tabs\Tab::make(__('About Us Page'))
                            ->icon('heroicon-o-megaphone')
                            ->badge(7)
                            ->schema([
                                RichEditor::make('about_desc_ar')
                                    ->label(__('Description (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->required(),
                                RichEditor::make('about_desc_en')
                                    ->label(__('Description (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->required(),
                                TextInput::make('expert')
                                    ->label(__('Expert'))
                                    ->autofocus()
                                    ->numeric()
                                    ->columnSpanFull()
                                    ->required(),

                                FileUpload::make('about_image_one')
                                    ->label(__('Image One'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->reorderable()
                                    ->required(),
                                FileUpload::make('about_image_two')
                                    ->label(__('Image Two'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->reorderable()
                                    ->required(),
                                FileUpload::make('about_image_three')
                                    ->label(__('Image Three'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->reorderable()
                                    ->required(),
                                FileUpload::make('about_image_four')
                                    ->label(__('Image Four'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->reorderable()
                                    ->required(),



                            ])->columns(2),
                        Tabs\Tab::make(__('Static pages'))
                            ->icon('heroicon-o-megaphone')
                            ->badge(7)
                            ->schema([
                                Grid::make()->schema([
                                    Section::make(__('Hotel Reservation Page'))
                                        ->description(__('This page is for hotel reservation services and information.'))
                                        ->collapsible(true)

                                        ->schema([

                                            RichEditor::make('hotel_desc_ar')
                                                ->label(__('Description (Arabic)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            RichEditor::make('hotel_desc_en')
                                                ->label(__('Description (English)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            Section::make(__('Hotel Reservation Page Images'))

                                                ->collapsible(true)

                                                ->schema([

                                                    FileUpload::make('hotel_image_one')
                                                        ->label(__('Image One'))
                                                        ->image() // Optional: Specify if it's an image
                                                        ->disk('public')->directory('settings')
                                                        ->preserveFilenames()
                                                        ->reorderable()
                                                        ->required(),
                                                    FileUpload::make('hotel_image_two')
                                                        ->label(__('Image Two'))
                                                        ->image() // Optional: Specify if it's an image
                                                        ->disk('public')->directory('settings')
                                                        ->preserveFilenames()
                                                        ->reorderable()

                                                        ->required(),
                                                    FileUpload::make('hotel_image_three')
                                                        ->label(__('Image Three'))
                                                        ->image() // Optional: Specify if it's an image
                                                        ->disk('public')->directory('settings')
                                                        ->preserveFilenames()
                                                        ->reorderable()
                                                        ->required(),


                                                ])->columns(3),


                                        ])->columns(2),







                                ]),

                                Grid::make()->schema([
                                    Section::make(__('University Visa Page'))
                                        ->description(__('This page is for university visa services and information.'))
                                        ->collapsible(true)

                                        ->schema([

                                            RichEditor::make('university_visa_desc_ar')
                                                ->label(__('Description (Arabic)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            RichEditor::make('university_visa_desc_en')
                                                ->label(__('Description (English)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            Section::make(__('University Visa Page Images'))

                                                ->collapsible(true)

                                                ->schema([

                                                    FileUpload::make('university_visa_image_one')
                                                        ->label(__('Image One'))
                                                        ->image() // Optional: Specify if it's an image
                                                        ->disk('public')->directory('settings')
                                                        ->preserveFilenames()
                                                        ->reorderable()
                                                        ->required(),
                                                    FileUpload::make('university_visa_image_two')
                                                        ->label(__('Image Two'))
                                                        ->image() // Optional: Specify if it's an image
                                                        ->disk('public')->directory('settings')
                                                        ->preserveFilenames()
                                                        ->reorderable()

                                                        ->required(),
                                                    FileUpload::make('university_visa_image_three')
                                                        ->label(__('Image Three'))
                                                        ->image() // Optional: Specify if it's an image
                                                        ->disk('public')->directory('settings')
                                                        ->preserveFilenames()
                                                        ->reorderable()
                                                        ->required(),


                                                ])->columns(3),


                                        ])->columns(2),







                                ]),

                                Grid::make()->schema([
                                    Section::make(__('Study Offers Page'))
                                        ->description(__('This page is for study offers services and information.'))
                                        ->collapsible(true)

                                        ->schema([

                                            RichEditor::make('study_offers_desc_ar')
                                                ->label(__('Description (Arabic)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            RichEditor::make('study_offers_desc_en')
                                                ->label(__('Description (English)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            FileUpload::make('study_offers_image')
                                                ->label(__('Image'))
                                                ->image() // Optional: Specify if it's an image
                                                ->disk('public')->directory('settings')
                                                ->columnSpanFull()
                                                ->preserveFilenames()
                                                ->reorderable()
                                                ->required(),




                                        ])->columns(2),







                                ]),


                                Grid::make()->schema([
                                    Section::make(__('Summer Camp Page'))
                                        ->description(
                                            __('This page is for summer camp services and information.')
                                        )
                                        ->collapsible(true)

                                        ->schema([

                                            RichEditor::make('summer_camp_desc_ar')
                                                ->label(__('Description (Arabic)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            RichEditor::make('summer_camp_desc_en')
                                                ->label(__('Description (English)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            FileUpload::make('summer_camp_image')
                                                ->label(__('Image'))
                                                ->image() // Optional: Specify if it's an image
                                                ->disk('public')->directory('settings')
                                                ->columnSpanFull()
                                                ->preserveFilenames()
                                                ->reorderable()
                                                ->required(),




                                        ])->columns(2),







                                ]),

                                Grid::make()->schema([
                                    Section::make(__('Courses Page'))
                                        ->description(
                                            __('This page is for courses services and information.')
                                        )
                                        ->collapsible(true)

                                        ->schema([

                                            RichEditor::make('courses_desc_ar')
                                                ->label(__('Description (Arabic)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            RichEditor::make('courses_desc_en')
                                                ->label(__('Description (English)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            FileUpload::make('courses_image')
                                                ->label(__('Image'))
                                                ->image() // Optional: Specify if it's an image
                                                ->disk('public')->directory('settings')
                                                ->columnSpanFull()
                                                ->preserveFilenames()
                                                ->reorderable()
                                                ->required(),




                                        ])->columns(2),







                                ]),

                            ])->columns(2),

                    ]),
            ])->columns(1);
    }
}
