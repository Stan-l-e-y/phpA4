<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClientNotificationsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use App\Mail\NotificationMail;
use App\Models\Client;
use App\Models\ClientNotification;
use App\Models\Notification;
use App\Models\User;
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

// Route::get('/', [SessionsController::class, 'view']);


// Route::get('/navigation', function () {
//     return view('navigation');
// })->middleware('auth');

// Route::get('/', [UsersController::class, 'show']);
Route::get('/', function () {
    return ('Hello world');
});
