<?php

use App\Http\Controllers\Admin\apartments\ApartmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Braintree\Gateway;


Route::get('/pay', function () {
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);

    $token = $gateway->ClientToken()->generate();
    return view('subsForm', compact("token"));
});

// Route::get('/Admin/dashboard', function () {
//     return view('Admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// FOR TESTING

Route::middleware(['auth', 'verified'])
    ->prefix("Admin")
    ->name("Admin.")
    ->group(function () {
        Route::get("/dashboard", [DashboardController::class, 'userInfo'])->name('dashboard');
        Route::get("/dashboard/messages", [DashboardController::class, 'userMessages'])->name('dashboard.messages');
        Route::resource("/apartments", ApartmentController::class);
    });

// Route::post('apartment/message', [MessageController::class, 'create'])->name('apartment.message');
// Route::resource('apartment/message', MessageController::class)->except('update', 'edit', 'index');
// Route::get('apartment', [MessageController::class, 'checkRead'])->name('messages.read');
Route::get('apartments/messages/{id}', [MessageController::class, 'create'])->name('messages.create');
Route::post('apartments/messages/store/{id}', [MessageController::class, 'store'])->name('messages.store');
Route::get('apartments/messages/{id}/read', [MessageController::class, 'checkRead'])->name('messages.read');

//******************** PAYMENT ************/
Route::post('/checkout', [SubscriptionController::class, 'subsAdd']

    //                     function (Request $request) {
    // $gateway = new Braintree\Gateway([
    //     'environment' => config('services.braintree.environment'),
    //     'merchantId' => config('services.braintree.merchantId'),
    //     'publicKey' => config('services.braintree.publicKey'),
    //     'privateKey' => config('services.braintree.privateKey')
    // ]);

    // $amount = $request->amount;
    // $nonce = $request->payment_method_nonce;

    // $result = $gateway->transaction()->sale([
    //     'amount' => $amount,
    //     'paymentMethodNonce' => $nonce,
    //     'customer' => [
    //         'firstName' => 'Tony',
    //         'lastName' => 'Stark',
    //         'email' => 'tony@avengers.com',
    //     ],
    //     'options' => [
    //         'submitForSettlement' => true
    //     ]
    // ]);

    // if ($result->success) {
    //     $transaction = $result->transaction;
    //     // header("Location: transaction.php?id=" . $transaction->id);

    //     return back()->with('success_message', 'Transaction successful. The ID is:' . $transaction->id);
    // } else {
    //     $errorString = "";

    //     foreach ($result->errors->deepAll() as $error) {
    //         $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
    //     }

    //     // $_SESSION["errors"] = $errorString;
    //     // header("Location: index.php");
    //     return back()->withErrors('An error occurred with the message: ' . $result->message);
    // }
);

Route::get("/subsForm/{id}", [SubscriptionController::class, "subsForm"])
->name("subs.form");