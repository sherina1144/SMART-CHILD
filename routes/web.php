<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.header');
})->name('home');

// Route About 
Route::get('/about', function () {
    return view('user.about');
})->name('about');

// Group Route untuk Development
Route::prefix('development')->name('development.')->group(function () {
    // Child Development 
    Route::get('/child-development', function () {
        return view('user.development.child_development');
    })->name('child');

    // Assessment 
    Route::get('/assessment', function () {
        return view('user.development.assesment');
    })->name('assessment');

    // Smart Recommendation 
    Route::get('/smart-recommendation', function () {
        return view('user.development.smart_recomendation');
    })->name('recommendation');
});

// Group Route untuk Shop
Route::prefix('shop')->name('shop.')->group(function () {
    // Shop By Age 
    Route::get('/by-age', function () {
        return view('user.shop.shop_byage');
    })->name('byage');

    // Shop By Development
    Route::get('/by-development', function () {
        return view('user.shop.shop_bydevelopment');
    })->name('bydevelopment');

    // Smart Child Box 
    Route::get('/smart-box', function () {
        return view('user.shop.smart_childbox');
    })->name('smartbox');
});

// Group Route untuk Services
Route::prefix('services')->name('services.')->group(function () {
    // Doctor & Therapist 
    Route::get('/doctor-and-therapist', function () {
        return view('user.services.doctor_trapis');
    })->name('doctor');

    // Book Consultation 
    Route::get('/book-consultation', function () {
        return view('user.services.book_consultation');
    })->name('book_consultation');

    // Parenting Academy 
    Route::get('/parenting-academy', function () {
        return view('user.services.parenting_academy');
    })->name('parenting_academy');
});

// Group Route untuk Partnership
Route::prefix('partnership')->name('partnership.')->group(function () {
    // School Partnership -> 
    Route::get('/school-partnership', function () {
        return view('user.partnership.partner_school');
    })->name('school');

    // Business Partner 
    Route::get('/business-partner', function () {
        return view('user.partnership.partner_bussines');
    })->name('business');
});

//routes contact
Route::get('/contact', function () {
    return view('user.contact_us');
})->name('contact.us');

// Route Community 
Route::get('/community', function () {
    return view('user.community');
})->name('community');