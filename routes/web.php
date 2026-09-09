<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
<<<<<<< HEAD
    return view('layout.header');
})->name('home');

// Route About 
=======
    return view('user.home');
})->name('home');


/*
|--------------------------------------------------------------------------
| ABOUT
|--------------------------------------------------------------------------
*/

>>>>>>> dbc7e2e1e3083e14d5f4a33d4bcde8977cfaa68d
Route::get('/about', function () {
    return view('user.about');
})->name('about');

<<<<<<< HEAD
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
=======

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
>>>>>>> dbc7e2e1e3083e14d5f4a33d4bcde8977cfaa68d
