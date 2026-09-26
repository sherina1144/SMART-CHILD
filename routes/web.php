<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ShopDevelopmentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ParentingAcademyController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsletterController;
use App\Models\Consultation;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES (Public)
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/


Route::get('/', [HomeController::class, 'index'])->name('home');





/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES
|--------------------------------------------------------------------------
*/

// HOME
Route::get('/home', function () {
    return view('user.home');
})->middleware('auth');

Route::get('/about', function () {
    return view('user.about');
})->name('about')->middleware('auth');


/*
|--------------------------------------------------------------------------
| DEVELOPMENT
|--------------------------------------------------------------------------
*/

Route::prefix('development')
    ->name('development.')
    ->middleware('auth')
    ->group(function () {

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

Route::prefix('shop')
    ->name('shop.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/by-age', function () {
            return view('user.shop.shop_byage');
        })->name('byage');

        Route::get('/shop-by-development', [ShopDevelopmentController::class, 'index'])
            ->name('bydevelopment');

        Route::get('/all-products', [ShopDevelopmentController::class, 'allProducts'])
            ->name('allproducts');

        Route::get('/smart-box', function () {
            return view('user.shop.smart_childbox');
        })->name('smartbox');


        /*
        |----------------------------------------------------------------------
        | CART
        |----------------------------------------------------------------------
        */

        Route::get('/cart', [CartController::class, 'index'])
            ->name('cart');

        Route::post('/cart/add/{product}', [CartController::class, 'add'])
            ->name('cart.add');

        Route::post('/cart/update/{product}', [CartController::class, 'update'])
            ->name('cart.update');

        Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])
            ->name('cart.remove');


        /*
        |----------------------------------------------------------------------
        | CHECKOUT
        |----------------------------------------------------------------------
        */

        Route::get('/checkout', [OrderController::class, 'checkout'])
            ->name('checkout');

        Route::post('/checkout/order', [OrderController::class, 'store'])
            ->name('checkout.order');

        Route::get('/my-orders', [OrderController::class, 'index'])
            ->name('myorders');

        Route::get('/my-orders/{id}', [OrderController::class, 'show'])
            ->name('myorders.show');
    });


/*
|--------------------------------------------------------------------------
| SERVICES (USER)
|--------------------------------------------------------------------------
*/

Route::prefix('services')
    ->name('services.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/doctor-and-therapist', [DoctorController::class, 'userIndex'])
            ->name('doctor');

        Route::get('/doctor-and-therapist/{id}', [DoctorController::class, 'show'])
            ->name('doctor.show');

        Route::get('/book-consultation/{doctor_id?}', [ConsultationController::class, 'create'])
            ->name('book_consultation');

        Route::post('/book-consultation/store', [ConsultationController::class, 'store'])
            ->name('consultation.store');

        Route::get('/parenting-academy', [ParentingAcademyController::class, 'index'])
            ->name('parenting_academy');

        Route::post('/parenting-academy/subscribe', [ParentingAcademyController::class, 'subscribe'])
            ->name('parenting_academy.subscribe');
    });


/*
|--------------------------------------------------------------------------
| TAMBAHAN ROUTE USER SERVICES
|--------------------------------------------------------------------------
*/

Route::get('/services/doctor-and-therapist', [DoctorController::class, 'userIndex'])
    ->name('user.doctor.index')
    ->middleware('auth');

Route::get('/services/doctor-and-therapist/{id}', [DoctorController::class, 'show'])
    ->name('user.doctor.show')
    ->middleware('auth');

Route::get('/user/consultation/receipt/{id}', [ConsultationController::class, 'showReceipt'])
    ->name('user.consultation.receipt')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| NEWSLETTER
|--------------------------------------------------------------------------
*/

Route::post('/newsletter/store', [NewsletterController::class, 'store'])
    ->name('newsletter.store');


/*
|--------------------------------------------------------------------------
| PARTNERSHIP
|--------------------------------------------------------------------------
*/

Route::prefix('partnership')
    ->name('partnership.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/school-partnership', function () {
            return view('user.partnership.partner_school');
        })->name('school');

        Route::get('/business-partner', function () {
            return view('user.partnership.partner_bussines');
        })->name('business');
    });


/*
|--------------------------------------------------------------------------
| COMMUNITY & CONTACT
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/contact', [ContactController::class, 'index'])
        ->name('contact.us');

    Route::post('/contact/store', [ContactController::class, 'store'])
        ->name('contact.store');

    Route::get('/community', [CommunityController::class, 'index'])
        ->name('community');
});


/*
|--------------------------------------------------------------------------
| DOCTOR ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:doctor'])
    ->prefix('doctor')
    ->name('doctor.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return "Halaman Dashboard Khusus Dokter";
        })->name('dashboard');
    });


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('layout.dashboard_admin');
        })->name('dashboard');


        /*
        |----------------------------------------------------------------------
        | Doctor
        |----------------------------------------------------------------------
        */

        Route::get('/tambah-doctor', function () {
            return view('admin.tambah_doctor');
        });

        Route::get('/doctor/add', [DoctorController::class, 'adminIndex'])
            ->name('doctor.add');

        Route::post('/doctor/store', [DoctorController::class, 'store'])
            ->name('doctor.store');

        Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])
            ->name('doctor.edit');

        Route::put('/doctor/{id}/update', [DoctorController::class, 'update'])
            ->name('doctor.update');

        Route::delete('/doctor/{id}/destroy', [DoctorController::class, 'destroy'])
            ->name('doctor.destroy');


        /*
        |----------------------------------------------------------------------
        | Doctor Schedule
        |----------------------------------------------------------------------
        */

        Route::post('/doctor/schedule/store', [DoctorController::class, 'storeSchedule'])
            ->name('doctor.schedule.store');

        Route::delete('/doctor/schedule/{id}/destroy', [DoctorController::class, 'destroySchedule'])
            ->name('doctor.schedule.destroy');


        /*
        |----------------------------------------------------------------------
        | Consultation
        |----------------------------------------------------------------------
        */

        Route::get('/daftar-consultation', [ConsultationController::class, 'indexAdmin'])
            ->name('daftar.consultation');

        Route::get('/consultations', [ConsultationController::class, 'indexAdmin'])
            ->name('consultation.index');

        Route::patch('/consultation/{id}/status', [ConsultationController::class, 'updateStatus'])
            ->name('consultation.updateStatus');


        /*
        |----------------------------------------------------------------------
        | Contact
        |----------------------------------------------------------------------
        */

        Route::get('/contact', [ContactController::class, 'adminIndex'])
            ->name('contact');

        Route::post('/contact/update', [ContactController::class, 'adminUpdate'])
            ->name('contact.update');


        /*
        |----------------------------------------------------------------------
        | Parenting Academy
        |----------------------------------------------------------------------
        */

        Route::prefix('parenting-academy')
            ->name('parenting.')
            ->group(function () {

                Route::get('/', [ParentingAcademyController::class, 'indexAdmin'])
                    ->name('index');


                // CRUD Academy

                Route::get('/academy/create', [ParentingAcademyController::class, 'createAcademy'])
                    ->name('academy.create');

                Route::post('/academy/store', [ParentingAcademyController::class, 'storeAcademy'])
                    ->name('academy.store');

                Route::get('/academy/{id}/edit', [ParentingAcademyController::class, 'editAcademy'])
                    ->name('academy.edit');

                Route::put('/academy/{id}/update', [ParentingAcademyController::class, 'updateAcademy'])
                    ->name('academy.update');

                Route::delete('/academy/{id}/destroy', [ParentingAcademyController::class, 'destroyAcademy'])
                    ->name('academy.destroy');


                // CRUD Video

                Route::get('/video/create', [ParentingAcademyController::class, 'createVideo'])
                    ->name('video.create');

                Route::post('/video/store', [ParentingAcademyController::class, 'storeVideo'])
                    ->name('video.store');

                Route::get('/video/{id}/edit', [ParentingAcademyController::class, 'editVideo'])
                    ->name('video.edit');

                Route::put('/video/{id}/update', [ParentingAcademyController::class, 'updateVideo'])
                    ->name('video.update');

                Route::delete('/video/{id}/destroy', [ParentingAcademyController::class, 'destroyVideo'])
                    ->name('video.destroy');
            });
    });


/*
|--------------------------------------------------------------------------
| CONSULTATION USER
|--------------------------------------------------------------------------
*/

Route::get('/consultation/create/{doctor_id}', [ConsultationController::class, 'create'])
    ->name('user.consultation.create')
    ->middleware('auth');

Route::post('/consultation/store', [ConsultationController::class, 'store'])
    ->name('user.consultation.store')
    ->middleware('auth');

Route::get('/my-consultations', [ConsultationController::class, 'myConsultations'])
    ->name('user.consultations.index')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| API INTERNAL (ANTI DOUBLE BOOKING)
|--------------------------------------------------------------------------
*/

Route::get('/api/check-booked-slots', function (Request $request) {

    $bookedTimes = Consultation::where('doctor_id', $request->doctor_id)
        ->where('booking_date', $request->date)
        ->whereNotIn('status_konsultasi', [
            'Cancelled',
            'cancel',
            'Refunded'
        ])
        ->pluck('booking_time')
        ->toArray();

    return response()->json($bookedTimes);
})->middleware('auth');


/*
|--------------------------------------------------------------------------
| PROFILE USER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [AuthController::class, 'showProfile'])
        ->name('profile.show');

    Route::get('/profile/edit', [AuthController::class, 'editProfile'])
        ->name('profile.edit');

    Route::put('/profile/update', [AuthController::class, 'updateProfile'])
        ->name('profile.update');
});


/*
|--------------------------------------------------------------------------
| PARTNERSHIP USER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/partnership', [PartnershipController::class, 'index'])
        ->name('user.partnership');

    Route::get('/partnership/form', [PartnershipController::class, 'create'])
        ->name('partnership.form');

    Route::post('/partnership/store', [PartnershipController::class, 'store'])
        ->name('partnership.store');
});


/*
|--------------------------------------------------------------------------
| PARTNERSHIP ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/partnerships', [PartnershipController::class, 'adminIndex'])
        ->name('admin.partnership');

    Route::put('/admin/partnerships/{id}/status', [PartnershipController::class, 'updateStatus'])
        ->name('admin.partnership.status');
});
