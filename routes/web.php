<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\EventController as AdminEventController;

Route::get('/event/{id}', [EventController::class, 'showById'])->name('event.detail.id');
Route::get('/event/slug/{slug}', [EventController::class, 'showBySlug'])->name('event.detail.slug');

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }
        return redirect('/dashboard');
    }
    return redirect('/login');
});

Route::get('/checkout/{id}', [EventController::class, 'checkout']);
Route::post('/checkout/{id}', [EventController::class, 'checkoutPost'])->name('checkout.post');

use App\Http\Controllers\ProfileController;

Route::get('/profile', function () {
    return view('profile', ['user' => Auth::user()]);
})->middleware('auth')->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Admin routes with isAdmin middleware
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(callback: function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Admin dashboard view
    })->name('admin.dashboard');

    // Ticket management routes
    Route::resource('tickets', TicketController::class, ['as' => 'admin']);

    // Event management routes
    Route::resource('events', AdminEventController::class, ['as' => 'admin']);
});

// User dashboard route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $events = [
            [
                'id' => 1,
                'name' => 'LED ZEPPELIN',
                'date' => '12 November 2014',
                'location' => 'Kingswell | Los Angles',
                'price' => 'From $135',
                'image' => 'event-1.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Jazz Night',
                'date' => '15 October 2025',
                'location' => 'Jazz Club | City Center',
                'price' => 'From IDR $150',
                'image' => 'event-2.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Pop Concert',
                'date' => '5 November 2025',
                'location' => 'Stadium | Downtown',
                'price' => 'From IDR $200',
                'image' => 'event-3.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Classical Evening',
                'date' => '20 December 2025',
                'location' => 'Opera House | Uptown',
                'price' => 'From IDR $180',
                'image' => 'event-4.jpg',
            ],
            [
                'id' => 5,
                'name' => 'Hip Hop Battle',
                'date' => '10 January 2026',
                'location' => 'Arena | City Park',
                'price' => 'From $120',
                'image' => 'event-5.jpg',
            ],
            [
                'id' => 6,
                'name' => 'Electronic Dance',
                'date' => '25 February 2026',
                'location' => 'Club XYZ | Beachside',
                'price' => 'From $160',
                'image' => 'event-6.jpg',
            ],
            [
                'id' => 7,
                'name' => 'Indie Showcase',
                'date' => '30 March 2026',
                'location' => 'Theater | Old Town',
                'price' => 'From $140',
                'image' => 'event-7.jpg',
            ],
            [
                'id' => 8,
                'name' => 'Reggae Fest',
                'date' => '15 April 2026',
                'location' => 'Park | Riverside',
                'price' => 'From $130',
                'image' => 'event-8.jpg',
            ],
        ];
        return view('home', ['events' => $events]); // User homepage view with events
    })->name('dashboard');
});
