<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HOME & ABOUT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/about', function () {
    return view('user.about');
})->name('about');

/*
|--------------------------------------------------------------------------
| DEVELOPMENT
|--------------------------------------------------------------------------
*/

Route::prefix('development')->name('development.')->group(function () {
    Route::get('/child-development', function () {
        return view('user.development.child_development');
    })->name('child');

    Route::get('/assessment', function () {
        return view('user.development.assesment');
    })->name('assessment');

    Route::get('/smart-recommendation', function () {
        return view('user.development.smart_recomendation');
    })->name('recommendation');
});

/*
|--------------------------------------------------------------------------
| SHOP
|--------------------------------------------------------------------------
*/

Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/by-age', function () {
        return view('user.shop.shop_byage');
    })->name('byage');

    Route::get('/by-development', function () {
        return view('user.shop.shop_bydevelopment');
    })->name('bydevelopment');

    Route::get('/smart-box', function () {
        return view('user.shop.smart_childbox');
    })->name('smartbox');
});

/*
|--------------------------------------------------------------------------
| SERVICES
|--------------------------------------------------------------------------
*/

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/doctor-and-therapist', function () {
        return view('user.services.doctor_trapis');
    })->name('doctor');

    Route::get('/book-consultation', function () {
        return view('user.services.book_consultation');
    })->name('book_consultation');

    Route::get('/parenting-academy', function () {
        return view('user.services.parenting_academy');
    })->name('parenting_academy');
});

/*
|--------------------------------------------------------------------------
| PARTNERSHIP
|--------------------------------------------------------------------------
*/

Route::prefix('partnership')->name('partnership.')->group(function () {
    Route::get('/school-partnership', function () {
        return view('user.partnership.partner_school');
    })->name('school');

    Route::get('/business-partner', function () {
        return view('user.partnership.partner_bussines');
    })->name('business');
});

/*
|--------------------------------------------------------------------------
| OTHERS
|--------------------------------------------------------------------------
*/

Route::get('/contact', function () {
    return view('user.contact_us');
})->name('contact.us');

Route::get('/community', function () {
    return view('user.community');
})->name('community');