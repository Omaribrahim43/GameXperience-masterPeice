<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\BookingsController;
use App\Http\Controllers\Backend\DeviceController;
use App\Http\Controllers\Backend\DeviceTypesController;
use App\Http\Controllers\Backend\LoungeDeviceTypesController;
use App\Http\Controllers\Backend\LoungeGalleryController;
use App\Http\Controllers\Backend\LoungesController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\UserBalanceController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\LoungeGallery;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.home.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin group middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('admin/change/password', [AdminController::class, 'AdminChangePassord'])->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class, 'AdminUpdatePassord'])->name('admin.update.password');
    Route::post('admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
}); // End of Group Admin Middleware

// Admin group middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::put('service/change-status', [ServiceController::class, 'changeStatus'])->name('service.change-status');
    Route::resource('service', ServiceController::class);

    Route::put('users/change-status', [UserController::class, 'changeStatus'])->name('users.change-status');
    Route::get('users/admins', [UserController::class, 'showAdmins'])->name('show.admins');
    Route::get('users/normalUsers', [UserController::class, 'showNormalUsers'])->name('show.normal-users');
    Route::get('users/agentUsers', [UserController::class, 'showAgentUsers'])->name('show.agent-users');
    Route::resource('users', UserController::class);

    Route::put('lounges/change-status', [LoungesController::class, 'changeStatus'])->name('lounges.change-status');
    Route::resource('lounges', LoungesController::class);

    Route::resource('lounge-gallery', LoungeGalleryController::class);
    Route::resource('lounge-device-types', LoungeDeviceTypesController::class);


    Route::put('device-types/change-status', [DeviceTypesController::class, 'changeStatus'])->name('device-types.change-status');
    Route::resource('device-types', DeviceTypesController::class);

    Route::put('device/change-status', [DeviceController::class, 'changeStatus'])->name('device.change-status');
    Route::resource('device', DeviceController::class);

    Route::resource('user-balance', UserBalanceController::class);

    Route::resource('payment-method', PaymentMethodController::class);

    Route::resource('bookings', BookingsController::class);

}); // End of Group Admin Middleware

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
}); // End of Group Admin Middleware

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
