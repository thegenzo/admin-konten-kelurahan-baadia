<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FamilyCardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ResidentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'admin-panel'], function () {
        Route::get('/dashboard', DashboardController::class)->name('admin-panel.dashboard');

        Route::resource('user', UserController::class, ['as' => 'admin-panel']);

        Route::resource('news', NewsController::class, ['as' => 'admin-panel']);

        Route::resource('announcement', AnnouncementController::class, ['as' => 'admin-panel']);

        Route::resource('family-card', FamilyCardController::class, ['as' => 'admin-panel']);

        Route::post('/resident/{familyCardId}', [ResidentController::class, 'store'])->name('admin-panel.resident.store');
        Route::resource('resident', ResidentController::class, ['as' => 'admin-panel']);
    });
});

require __DIR__.'/auth.php';
