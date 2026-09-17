<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ParentingAcademyController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES (Public)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Opsional: Jika / (root) diakses, langsung arahkan ke halaman login
Route::get('/', function () {
    return redirect('/login');
});


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Wajib Login)
|--------------------------------------------------------------------------
*/

// HOME
Route::get('/home', function () {
    return view('user.home');
})->name('home')->middleware('auth');

Route::get('/about', function () {
    return view('user.about');
})->name('about')->middleware('auth');

// DEVELOPMENT
Route::prefix('development')->name('development.')->middleware('auth')->group(function () {
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

// SHOP
Route::prefix('shop')->name('shop.')->middleware('auth')->group(function () {
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

// SERVICES
Route::prefix('services')->name('services.')->middleware('auth')->group(function () {
    Route::get('/doctor-and-therapist', [DoctorController::class, 'userIndex'])->name('doctor');
    Route::get('/doctor-and-therapist/{id}', [DoctorController::class, 'show'])->name('doctor.show');

    Route::get('/book-consultation/{doctor_id?}', [ConsultationController::class, 'create'])->name('book_consultation');
    Route::post('/book-consultation/store', [ConsultationController::class, 'store'])->name('consultation.store');

    Route::get('/parenting-academy', [ParentingAcademyController::class, 'index'])->name('parenting_academy');
    Route::post('/parenting-academy/subscribe', [ParentingAcademyController::class, 'subscribe'])->name('parenting_academy.subscribe');
});

Route::get('/services/doctor-and-therapist', [DoctorController::class, 'userIndex'])->name('user.doctor.index')->middleware('auth');
Route::get('/services/doctor-and-therapist/{id}', [DoctorController::class, 'show'])->name('user.doctor.show')->middleware('auth');
Route::get('/user/consultation/receipt/{id}', [ConsultationController::class, 'showReceipt'])->name('user.consultation.receipt')->middleware('auth');

// PARTNERSHIP
Route::prefix('partnership')->name('partnership.')->middleware('auth')->group(function () {
    Route::get('/school-partnership', function () {
        return view('user.partnership.partner_school');
    })->name('school');

    Route::get('/business-partner', function () {
        return view('user.partnership.partner_bussines');
    })->name('business');
});

// OTHERS (Community & Contact)
Route::get('/contact', function () {
    return view('user.contact_us');
})->name('contact.us')->middleware('auth');

Route::get('/community', [CommunityController::class, 'index'])->name('community')->middleware('auth');


/*
|--------------------------------------------------------------------------
| DOCTOR ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', function () {
        return "Halaman Dashboard Khusus Dokter";
    })->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
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

    Route::get('/consultations', [ConsultationController::class, 'indexAdmin'])->name('consultation.index');

    // --- PARENTING ACADEMY (ADMIN CRUD) ---
    Route::get('/parenting-academy', [ParentingAcademyController::class, 'indexAdmin'])->name('parenting.index');
    Route::get('/parenting-academy/create', [ParentingAcademyController::class, 'create'])->name('parenting.create');
    Route::post('/parenting-academy/store', [ParentingAcademyController::class, 'store'])->name('parenting.store');
    Route::get('/parenting-academy/{id}/edit', [ParentingAcademyController::class, 'edit'])->name('parenting.edit');
    Route::put('/parenting-academy/{id}/update', [ParentingAcademyController::class, 'update'])->name('parenting.update');
    Route::delete('/parenting-academy/{id}/destroy', [ParentingAcademyController::class, 'destroy'])->name('parenting.destroy');
});