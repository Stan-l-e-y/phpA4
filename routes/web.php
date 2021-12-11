<?php

use App\Client;
use App\ClientNotification;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClientNotificationsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use App\Mail\NotificationMail;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SessionsController::class, 'view']);


Route::get('/navigation', function () {
    return view('navigation');
})->middleware(['auth', 'status']);


//Client Routes

Route::get('/clients/create', [ClientsController::class, 'create'])->middleware(['auth', 'status']);


Route::get('/clients', [ClientsController::class, 'show'])->middleware(['auth', 'status']);

Route::post('/clients', [ClientsController::class, 'store'])->middleware(['auth', 'status']);

//Utilizing Route Model binding, to bind a model to a route and display an entry in a view
Route::get('/clients/{client}/edit', function (Client $client) {
    return view('client-update', [
        'client' => $client
    ]);
})->middleware(['auth', 'status']);

Route::patch('/clients/{client}', [ClientsController::class, 'update'])->middleware(['auth', 'status']);

Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->middleware(['auth', 'status']);


//Notification Routes

Route::get('/notifications', [NotificationsController::class, 'show'])->middleware(['auth', 'status']);

Route::get('/notifications/create', [NotificationsController::class, 'create'])->middleware(['auth', 'status']);

Route::post('/notifications', [NotificationsController::class, 'store'])->middleware(['auth', 'status']);

Route::get('/notifications/{notification}/edit', function (Notification $notification) {
    return view('notification-update', [
        'notification' => $notification
    ]);
})->middleware(['auth', 'status']);

Route::patch('/notifications/{notification}', [NotificationsController::class, 'update'])->middleware(['auth', 'status']);

Route::delete('/notifications/{notification}', [NotificationsController::class, 'destroy'])->middleware(['auth', 'status']);

//Client Event Routes /clientnotifications

Route::get('/clientnotifications', [ClientNotificationsController::class, 'show'])->middleware(['auth', 'status']);

Route::get('/clientnotifications/create', [ClientNotificationsController::class, 'create'])->middleware(['auth', 'status']);

Route::post('/clientnotifications', [ClientNotificationsController::class, 'store'])->middleware(['auth', 'status']);

Route::get('/clientnotifications/{clientnotification}/edit', function (ClientNotification $clientnotification) {
    return view('clientnotification-update', [
        'clientnotification' => $clientnotification
    ]);
})->middleware(['auth', 'status']);

Route::patch('/clientnotifications/{clientnotification}', [ClientNotificationsController::class, 'update'])->middleware(['auth', 'status']);

Route::delete('/clientnotifications/{clientnotification}', [ClientNotificationsController::class, 'destroy'])->middleware(['auth', 'status']);



//Register a user corresponding routes
// Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

// Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


//Session routes
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware(['auth', 'status']);

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login');

Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');


//Employee routes

Route::get('/users', [UsersController::class, 'show'])->middleware(['auth', 'status']);

Route::get('/users/create', [UsersController::class, 'create'])->middleware(['auth', 'status']);

Route::post('/users', [UsersController::class, 'store'])->middleware(['auth', 'status']);

Route::get('/users/{user}/edit', function (User $user) {
    return view('user-update', [
        'user' => $user
    ]);
})->middleware(['auth', 'status']);

Route::patch('/users/{user}', [UsersController::class, 'update'])->middleware(['auth', 'status']);

Route::delete('/users/{user}', [UsersController::class, 'destroy'])->middleware(['auth', 'status']);

//Log route
Route::get('/logs', [LogsController::class, 'show'])->middleware(['auth', 'status']);


//Mail route
// Route::get('/email', function () {
//     Mail::to('stanleytsonev@hotmail.com')->send(new NotificationMail());
//     return new NotificationMail();
// })->middleware('auth');;
