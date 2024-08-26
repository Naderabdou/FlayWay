<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\StaticPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('Site')->name('site.')->middleware('lang')->group(function () {
    // -------------------------------- Home Page Routes --------------------------------//
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::post('service-request', [HomeController::class,'service_request'])->name('service.request');
    Route::post('contact-request', [HomeController::class,'contact_request'])->name('contact.request');

    //-------------------------------- End Home Page Routes ------------------------------//


    // -------------------------------- Static Page Routes --------------------------------//
    Route::get('about', [StaticPageController::class,'about'])->name('about');
    Route::get('contact', [StaticPageController::class,'contact'])->name('contact');
    Route::get('services', [StaticPageController::class,'services'])->name('services');
    Route::get('hotel-reservation', [StaticPageController::class,'hotel'])->name('hotel');
    Route::get('study/language/{slug}', [StaticPageController::class,'language'])->name('language');
    Route::get('study-offers', [StaticPageController::class,'study'])->name('study');
    Route::get('summer-camp', [StaticPageController::class,'summer_camp'])->name('summer.camp');
    Route::get('university-visa', [StaticPageController::class,'university_visa'])->name('university.visa');
    Route::get('courses', [StaticPageController::class,'courses'])->name('courses');


    Route::get('/study/tourism/{slug}', [StaticPageController::class,'tourism_study'])->name('tourism.study');
    Route::get('/tourism/destinations/{slug}', [StaticPageController::class,'tourism_destinations'])->name('tourism.destinations');
    Route::get('/tourism/destinations', [StaticPageController::class,'all_destinations'])->name('destinations');

    //-------------------------------- End Static Page Routes ------------------------------//










    Route::get('/lang/{lang}', [HomeController::class,'lang'])->name('lang');
});


Route::fallback(function () {
    return redirect()->route('site.home');
});
