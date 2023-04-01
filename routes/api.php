<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SubscriptionController;
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

Route::middleware('auth:sanctum')
    ->get(
        '/user',
        function (Request $request) {
            return $request->user();
        }
    );

Route::resource('/apartments', ApartmentController::class)->only(
    'index',
    'show'
);

Route::get('/search', [SearchController::class, 'search'])->name('apartments.search');

// Route::prefix('admin')
//     ->name('admin.')
//     ->group(function () {
//         Route::resource('/messages', AdminMessageController::class)->only(
//             'index',
//             'show',
//             'destroy'
//         );
//         Route::get('/apartments/{id}/subscriptions', [AdminApartmentController::class, "add_subscription"])->name("apartments.add_subscription");
//     });

// Route::resource('/messages', MessageController::class)->only(
//     'store'
// );

Route::resource('/services', ServiceController::class)->only(
    'index'
);
// Route::resource('/subscriptons', SubscriptionController::class)->only(
//     'index'
//);
