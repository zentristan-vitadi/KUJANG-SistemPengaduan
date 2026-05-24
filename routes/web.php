<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;

// Public routes (no auth needed)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/signin', function () {
    return view('pages.auth.signin', ['title' => 'Sign In']);
})->name('signin');

Route::get('/signup', function () {
    return view('pages.auth.signup', ['title' => 'Sign Up']);
})->name('signup');

Route::get('/register', function () {
    return view('auth.register', ['title' => 'Register']);
})->name('register');

Route::get('/error-404', function () {
    return view('pages.errors.error-404', ['title' => 'Error 404']);
})->name('error-404');

// Protected routes (must be logged in)
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Calendar
    Route::get('/calendar', function () {
        return view('pages.calender', ['title' => 'Calendar']);
    })->name('calendar');

    // Forms
    Route::get('/form-elements', function () {
        return view('pages.form.form-elements', ['title' => 'Form Elements']);
    })->name('form-elements');

    // Tables
    Route::get('/basic-tables', function () {
        return view('pages.tables.basic-tables', ['title' => 'Basic Tables']);
    })->name('basic-tables');

    // Blank
    Route::get('/blank', function () {
        return view('pages.blank', ['title' => 'Blank']);
    })->name('blank');

    // Charts
    Route::get('/line-chart', function () {
        return view('pages.chart.line-chart', ['title' => 'Line Chart']);
    })->name('line-chart');

    Route::get('/bar-chart', function () {
        return view('pages.chart.bar-chart', ['title' => 'Bar Chart']);
    })->name('bar-chart');

    // UI Elements
    Route::get('/alerts', function () {
        return view('pages.ui-elements.alerts', ['title' => 'Alerts']);
    })->name('alerts');

    Route::get('/avatars', function () {
        return view('pages.ui-elements.avatars', ['title' => 'Avatars']);
    })->name('avatars');

    Route::get('/badge', function () {
        return view('pages.ui-elements.badges', ['title' => 'Badges']);
    })->name('badges');

    Route::get('/buttons', function () {
        return view('pages.ui-elements.buttons', ['title' => 'Buttons']);
    })->name('buttons');

    Route::get('/image', function () {
        return view('pages.ui-elements.images', ['title' => 'Images']);
    })->name('images');

    Route::get('/videos', function () {
        return view('pages.ui-elements.videos', ['title' => 'Videos']);
    })->name('videos');

    Route::get('/pengaduan/create', function () {
        return view('complaints.create', ['title' => 'Create Complaint']);
    })->name('pengaduan.create');





    // RESPONSES ROUTES
    Route::get('/responses', [ResponseController::class, 'index'])->name('responses.index');
    Route::get('/responses/show/{id}', [ResponseController::class, 'show'])->name('responses.show');

    Route::post('/responses/store/{id}', [ResponseController::class, 'store'])->name('responses.store');


    // RESPONSE ROUTES END

    // COMPlAINTS ROUTES
    Route::get('/pengaduan', [ComplaintController::class, 'index'])->name('complaint.index');

    Route::get('/complaints/create', [ComplaintController::class, 'tampil_data'])->name('complaint.create');
    Route::post('/complaints/store', [ComplaintController::class, 'store'])->name('complaint.store');

    Route::get('/complaints/show/{id}', [ComplaintController::class, 'show'])->name('complaint.show');
    Route::put('/complaints/{id}', [ComplaintController::class, 'update'])->name('complaint.update');

    Route::delete('/complaints/destroy/{id}', [ComplaintController::class, 'destroy'])->name('complaint.destroy');
});

require __DIR__ . '/auth.php';
