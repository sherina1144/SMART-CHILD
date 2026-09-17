<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ConsultationController;
use App\Models\Consultation;

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
| SERVICES (USER)
|--------------------------------------------------------------------------
*/

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/parenting-academy', function () {
        return view('user.services.parenting_academy');
    })->name('parenting_academy');
});

// Route User -> Doctor & Therapist
Route::get('/services/doctor-and-therapist', [DoctorController::class, 'userIndex'])->name('user.doctor.index');
Route::get('/services/doctor-and-therapist/{id}', [DoctorController::class, 'show'])->name('user.doctor.show');

// Route User -> Book Consultation
Route::get('/services/book-consultation/{doctor_id?}', [ConsultationController::class, 'create'])->name('services.book_consultation');
Route::get('/user/consultation/create/{doctor_id?}', [ConsultationController::class, 'create'])->name('user.consultation.create');

Route::post('/services/book-consultation/store', [ConsultationController::class, 'store'])->name('user.consultation.store');
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
| OTHERS
|--------------------------------------------------------------------------
*/

Route::get('/contact', function () {
    return view('user.contact_us');
})->name('contact.us');

Route::get('/community', function () {
    return view('user.community');
})->name('community');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {
    return view('layout.dashboard_admin');
})->name('admin.dashboard');

Route::get('/admin/daftar-consultation', function () {
    return view('admin.daftar_consultation');
});

// Admin Consultations
Route::get('/admin/consultations', [ConsultationController::class, 'indexAdmin'])->name('admin.consultation.index');

// Admin Doctor Management & Schedules
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/doctor/add', [DoctorController::class, 'adminIndex'])->name('doctor.add');
    Route::post('/doctor/store', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctor/{id}/update', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctor/{id}/destroy', [DoctorController::class, 'destroy'])->name('doctor.destroy');

    // Route khusus Kelola Jadwal Terpisah Dokter
    Route::post('/doctor/schedule/store', [DoctorController::class, 'storeSchedule'])->name('doctor.schedule.store');
    Route::delete('/doctor/schedule/{id}/destroy', [DoctorController::class, 'destroySchedule'])->name('doctor.schedule.destroy');
});

/*
|--------------------------------------------------------------------------
| API INTERNAL (ANTI DOUBLE BOOKING)
|--------------------------------------------------------------------------
*/

Route::get('/api/check-booked-slots', function (Request $request) {
    $bookedTimes = Consultation::where('doctor_id', $request->doctor_id)
        ->where('booking_date', $request->date)
        ->whereIn('payment_status', ['Unpaid', 'Paid', 'Success'])
        ->pluck('booking_time')
        ->toArray();

    return response()->json($bookedTimes);
});