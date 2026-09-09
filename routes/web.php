<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('user.home');
})->name('home');


/*
|--------------------------------------------------------------------------
| ABOUT
|--------------------------------------------------------------------------
*/

Route::get('/about', function () {
    return view('user.about');
})->name('about');


/*
|--------------------------------------------------------------------------
| DEVELOPMENT
|--------------------------------------------------------------------------
*/

Route::get('/development/child', function () {
    return view('user.child_development');
})->name('development.child');

Route::get('/development/assessment', function () {
    return view('user.assesment');
})->name('development.assessment');

Route::get('/development/recommendation', function () {
    return view('user.smart_recomendation');
})->name('development.recommendation');


/*
|--------------------------------------------------------------------------
| SHOP
|--------------------------------------------------------------------------
*/

Route::get('/shop/by-age', function () {
    return view('user.shop_byage');
})->name('shop.byage');

Route::get('/shop/by-development', function () {
    return view('user.shop_bydevelopment');
})->name('shop.bydevelopment');

Route::get('/shop/smart-child-box', function () {
    return view('user.smart_childbox');
})->name('shop.smartbox');


/*
|--------------------------------------------------------------------------
| SERVICES
|--------------------------------------------------------------------------
*/

Route::get('/services/doctor', function () {
    return view('user.doctor_trapis');
})->name('services.doctor');

Route::get('/services/book-consultation', function () {
    return view('user.book_consultation');
})->name('services.book_consultation');

Route::get('/services/parenting-academy', function () {
    return view('user.parenting_academy');
})->name('services.parenting_academy');


/*
|--------------------------------------------------------------------------
| COMMUNITY
|--------------------------------------------------------------------------
*/

Route::get('/community', function () {
    return view('user.community');
})->name('community');


/*
|--------------------------------------------------------------------------
| PARTNERSHIP
|--------------------------------------------------------------------------
*/

Route::get('/partnership/school', function () {
    return view('user.partner_school');
})->name('partnership.school');

Route::get('/partnership/business', function () {
    return view('user.partner_bussines');
})->name('partnership.business');


/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::get('/contact', function () {
    return view('user.contact_us');
})->name('contact.us');