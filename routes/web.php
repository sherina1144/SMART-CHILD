<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ParentingAcademyController;
use App\Http\Controllers\CommunityController;

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
    // Doctor & Therapist
    Route::get('/doctor-and-therapist', [DoctorController::class, 'userIndex'])->name('doctor');
    Route::get('/doctor-and-therapist/{id}', [DoctorController::class, 'show'])->name('doctor.show');

    // Book Consultation (dari Main)
    Route::get('/book-consultation/{doctor_id?}', [ConsultationController::class, 'create'])->name('book_consultation');
    Route::post('/book-consultation/store', [ConsultationController::class, 'store'])->name('consultation.store');

    // Parenting Academy (dari Sherina)
    Route::get('/parenting-academy', [ParentingAcademyController::class, 'index'])->name('parenting_academy');
    Route::post('/parenting-academy/subscribe', [ParentingAcademyController::class, 'subscribe'])->name('parenting_academy.subscribe');
});

// Alias tambahan untuk route doctor & receipt
Route::get('/services/doctor-and-therapist', [DoctorController::class, 'userIndex'])->name('user.doctor.index');
Route::get('/services/doctor-and-therapist/{id}', [DoctorController::class, 'show'])->name('user.doctor.show');
Route::get('/user/consultation/receipt/{id}', [ConsultationController::class, 'showReceipt'])->name('user.consultation.receipt');

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
| OTHERS (Community & Contact)
|--------------------------------------------------------------------------
*/

Route::get('/contact', function () {
    return view('user.contact_us');
})->name('contact.us');

Route::get('/community', [CommunityController::class, 'index'])->name('community');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard & Manajemen Dokter
    Route::get('/dashboard', function () {
        return view('layout.dashboard_admin');
    })->name('dashboard');

    Route::get('/tambah-doctor', function () {
        return view('admin.tambah_doctor');
    });

    Route::get('/daftar-consultation', function () {
        return view('admin.daftar_consultation');
    });

    Route::get('/doctor/add', [DoctorController::class, 'adminIndex'])->name('doctor.add');
    Route::post('/doctor/store', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctor/{id}/update', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctor/{id}/destroy', [DoctorController::class, 'destroy'])->name('doctor.destroy');

    // Admin Consultations
    Route::get('/consultations', [ConsultationController::class, 'indexAdmin'])->name('consultation.index');
});