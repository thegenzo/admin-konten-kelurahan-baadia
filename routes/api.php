<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\API\AnnouncementController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register/{idNumber}', [AuthController::class, 'register']);
Route::post('check-id', [AuthController::class, 'checkIfIdNumberExist']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    
    Route::get('top_news', [NewsController::class, 'topNews']);
    Route::apiResource('news', NewsController::class);

    Route::get('top_announcement', [AnnouncementController::class, 'topAnnouncement']);
    Route::apiResource('announcement', AnnouncementController::class);

    Route::get('visi-misi', [SettingController::class, 'getVisiMisi']);
});
