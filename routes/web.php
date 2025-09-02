<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Trips
Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
Route::get('/trips/search', [TripController::class, 'search'])->name('trips.search');
Route::get('/trips/{id}', [TripController::class, 'show'])->name('trips.show');

// Destinations
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// User Dashboard Routes (Protected)
Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('password.change');
    Route::get('/bookings', [UserController::class, 'bookings'])->name('bookings');
    Route::get('/bookings/{id}', [UserController::class, 'bookingDetail'])->name('bookings.show');
    Route::get('/favorites', [UserController::class, 'favorites'])->name('favorites');
    Route::post('/favorites/{trip}/toggle', [UserController::class, 'toggleFavorite'])->name('favorites.toggle');
    Route::get('/reviews', [UserController::class, 'reviews'])->name('reviews');
    Route::post('/reviews', [UserController::class, 'storeReview'])->name('reviews.store');
    Route::put('/reviews/{review}', [UserController::class, 'updateReview'])->name('reviews.update');
    Route::delete('/reviews/{review}', [UserController::class, 'deleteReview'])->name('reviews.delete');
    Route::get('/reviews/{review}/edit', [UserController::class, 'editReview'])->name('reviews.edit');
    Route::get('/transactions', [UserController::class, 'transactions'])->name('transactions');
    Route::get('/settings', [UserController::class, 'settings'])->name('settings');
    Route::put('/settings', [UserController::class, 'updateSettings'])->name('settings.update');
    Route::put('/notifications', [UserController::class, 'updateNotifications'])->name('notifications.update');
    Route::put('/privacy', [UserController::class, 'updatePrivacy'])->name('privacy.update');
    Route::get('/notifications', [UserController::class, 'notifications'])->name('notifications');
    Route::get('/support', [UserController::class, 'support'])->name('support');
    Route::post('/support/contact', [UserController::class, 'contactSupport'])->name('support.contact');
    Route::put('/password', [UserController::class, 'updatePassword'])->name('password.update');
    Route::put('/preferences', [UserController::class, 'updatePreferences'])->name('preferences.update');

    Route::get('/review', [UserController::class, 'customerreviews'])->name('customer.reviews');
    Route::get('/withdrawl', [UserController::class, 'customerwithdraw'])->name('customer.withdrawl');
    Route::get('/customer-recharge', [UserController::class, 'customerRecharge'])->name('customer.customer_recharge');
    Route::get('/history', [UserController::class, 'customerhistory'])->name('customer.history');


    Route::get('/recharge', [UserController::class, 'showRecharge'])->name('recharge');
    
    Route::post('/recharge', [UserController::class, 'submitRecharge'])->name('recharge.submit');
    Route::post('/withdrawl', [UserController::class, 'submitWithdraw'])->name('withdraw.submit');
    Route::get('/review', [UserController::class, 'customerreviews'])->name('customer.reviews');
    Route::get('/write-review', [UserController::class, 'customerWriteReview'])->name('customer.write_review');
    Route::post('/write-review', [UserController::class, 'storeReview'])->name('customer.store_review');

    Route::get('/team', function () {
        return view('user.team');
    })->name('team');

    Route::view('/terms', 'user.terms')->name('terms');
    Route::view('/faq', 'user.faq')->name('faq');
    Route::view('/about', 'user.about')->name('about');

    Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('password.form');
});

// Public user info pages (accessible to guests)
Route::get('/user/team', function () {
    return view('user.team');
})->name('user.team');
Route::view('/user/terms', 'user.terms')->name('user.terms');
Route::view('/user/faq', 'user.faq')->name('user.faq');
Route::view('/user/about', 'user.about')->name('user.about');

// Static pages
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/signin', 'pages.signin')->name('signin');
Route::view('/design-trip', 'pages.design-trip')->name('design-trip');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});

// Admin Panel Routes (Protected)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Members Management
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    Route::resource('members', App\Http\Controllers\Admin\MemberController::class, [
        'as' => 'admin'
    ]);
    Route::post('/members/{id}/update-locked-products', [App\Http\Controllers\Admin\MemberController::class, 'updateLockedProducts'])->name('admin.members.updateLockedProducts');
    Route::post('/members/{id}/update-level-stop', [App\Http\Controllers\Admin\MemberController::class, 'updateLevelStop'])->name('admin.members.updateLevelStop');
    Route::post('/members/{id}/update-journey-lock', [App\Http\Controllers\Admin\MemberController::class, 'updateJourneyLock'])->name('admin.members.updateJourneyLock');
    
    // Trips Management
    Route::resource('trips', App\Http\Controllers\Admin\TripController::class);
    Route::post('/trips/{id}/toggle-status', [App\Http\Controllers\Admin\TripController::class, 'toggleStatus'])->name('trips.toggleStatus');
    Route::post('/trips/{id}/toggle-featured', [App\Http\Controllers\Admin\TripController::class, 'toggleFeatured'])->name('trips.toggleFeatured');
    Route::post('/trips/{id}/toggle-journey-lock', [App\Http\Controllers\Admin\TripController::class, 'toggleJourneyLock'])->name('trips.toggleJourneyLock');
    
    // Companies Management
    Route::resource('companies', App\Http\Controllers\Admin\CompanyController::class);
    Route::post('/companies/{id}/toggle-status', [App\Http\Controllers\Admin\CompanyController::class, 'toggleStatus'])->name('companies.toggleStatus');
    Route::post('/companies/{id}/toggle-featured', [App\Http\Controllers\Admin\CompanyController::class, 'toggleFeatured'])->name('companies.toggleFeatured');
    
    // Reviews Management
    Route::resource('reviews', App\Http\Controllers\Admin\ReviewController::class);
    Route::post('/reviews/{id}/approve', [App\Http\Controllers\Admin\ReviewController::class, 'approve'])->name('reviews.approve');
    Route::post('/reviews/{id}/reject', [App\Http\Controllers\Admin\ReviewController::class, 'reject'])->name('reviews.reject');
    Route::post('/reviews/bulk-action', [App\Http\Controllers\Admin\ReviewController::class, 'bulkAction'])->name('reviews.bulkAction');
    
    // Financial Management
    Route::get('/withdraw-list', [\App\Http\Controllers\Admin\WithdrawController::class, 'index'])->name('withdraw.list');
    Route::get('/deposite-list', [\App\Http\Controllers\Admin\DepositeController::class, 'index'])->name('deposite.list');
    Route::get('/withdraw-list/{user}', [\App\Http\Controllers\Admin\WithdrawController::class, 'userList'])->name('withdraw.user');
    Route::get('/deposite-list/{user}', [\App\Http\Controllers\Admin\DepositeController::class, 'userList'])->name('deposite.user');
    Route::post('/withdraw-update-status/{id}', [\App\Http\Controllers\Admin\WithdrawController::class, 'updateStatus'])->name('withdraw.updateStatus');
    Route::post('/withdraw/approve/{id}', [\App\Http\Controllers\Admin\WithdrawController::class, 'approve'])->name('withdraw.approve');
    Route::post('/withdraw/reject/{id}', [\App\Http\Controllers\Admin\WithdrawController::class, 'reject'])->name('withdraw.reject');
    Route::post('/deposite-update-status/{id}', [\App\Http\Controllers\Admin\DepositeController::class, 'updateStatus'])->name('deposite.updateStatus');
    Route::post('/deposite-approve/{id}', [\App\Http\Controllers\Admin\DepositeController::class, 'approve'])->name('deposite.approve');
    Route::post('/deposite-reject/{id}', [\App\Http\Controllers\Admin\DepositeController::class, 'reject'])->name('deposite.reject');
    Route::post('/withdraw-approve/{id}', [\App\Http\Controllers\Admin\WithdrawController::class, 'approve'])->name('admin.withdraw.approve');
    Route::post('/withdraw-reject/{id}', [\App\Http\Controllers\Admin\WithdrawController::class, 'reject'])->name('admin.withdraw.reject');
    Route::get('/order-list', [OrderController::class, 'index'])->name('order.list');
    
    // Product Management
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::post('/products/{id}/toggle-journey-lock', [App\Http\Controllers\Admin\ProductController::class, 'toggleJourneyLock'])->name('products.toggleJourneyLock');
    
    // Admin User Management Routes
    Route::prefix('users')->name('users.')->group(function () {
        Route::post('{user}/balance', [\App\Http\Controllers\Admin\MemberController::class, 'adjustBalance'])->name('adjustBalance');
        Route::post('{user}/bank', [\App\Http\Controllers\Admin\MemberController::class, 'updateBank'])->name('updateBank');
        Route::post('{user}/order', [\App\Http\Controllers\Admin\MemberController::class, 'setupOrder'])->name('setupOrder');
        Route::post('{user}/journey/add-products', [\App\Http\Controllers\Admin\MemberController::class, 'addProductsToJourney'])->name('journey.addProducts');
        Route::post('{user}/journey/remove-products', [\App\Http\Controllers\Admin\MemberController::class, 'removeProductsFromJourney'])->name('journey.removeProducts');
    });

    // Additional Admin Member Routes
    Route::post('/members/{id}/reset-journey', [\App\Http\Controllers\Admin\MemberController::class, 'resetJourney'])->name('members.resetJourney');

    // Admin Level Setting
    Route::get('/level-setting', [App\Http\Controllers\Admin\LevelSettingController::class, 'index'])->name('level.setting');
    Route::post('/level-setting', [App\Http\Controllers\Admin\LevelSettingController::class, 'store'])->name('level.setting.save');

    // Admin Wallet Settings
    Route::get('wallet-settings', [\App\Http\Controllers\Admin\WalletSettingController::class, 'index'])->name('wallet.settings');
    Route::post('wallet-settings', [\App\Http\Controllers\Admin\WalletSettingController::class, 'store'])->name('wallet.settings.save');
});

// User Journey Routes (Public)
Route::get('/rate-trip', [UserController::class, 'rateTrip'])->name('user.rate_trip');
Route::get('/resubmit-journey/{type}/{id}', [UserController::class, 'startJourney'])->name('user.customer.start_journey');
Route::post('/user/journey/submit/{order_id}', [UserController::class, 'submitJourney'])->name('user.journey.submit');
Route::post('/user/product/submit/{product_id}', [UserController::class, 'submitProduct'])->name('user.product.submit');
Route::post('/user/product/submit-locked/{product_id}', [UserController::class, 'submitLockedProduct'])->name('user.product.submit_locked');
Route::get('/start-locked-product/{id}', [App\Http\Controllers\UserController::class, 'startLockedProduct'])->name('user.customer.start_locked_product');
Route::get('/resume-trip/{product_id}', [App\Http\Controllers\UserController::class, 'resumeTrip'])->name('user.customer.resume_trip');

