<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    // return view('welcome');
    return view('user.agentlisttest');
    
});

Route::get('login', [UserController::class, 'login'])->name('login');
Route::get('signup', [UserController::class, 'signup'])->name('signup');
Route::post('loginAuth', [UserController::class, 'login_auth'])->name('login_auth');
Route::get('forgotPassword', [UserController::class, 'forgot_password'])->name('forgotPassword');
Route::get('SendResetPasswordLink', [UserController::class, 'sent_reset_password_link'])->name('SendResetPasswordLink');;
Route::get('resetPassword/{id}', [UserController::class, 'resetPasswordForm'])->name('resetPasswordForm');
Route::post('resetPassword', [UserController::class, 'resetPassword'])->name('resetPassword');

Route::middleware(['auth'])->group(function () {
     Route::get('logout', [UserController::class, 'logout'])->name('logout');
     Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

     Route::get('/agentlist', [AgentController::class, 'agentlist'])->name('agentlist');     
     Route::get('/agentlistajax', [AgentController::class, 'agentlistajax']);
     Route::post('/agentlist_update_ajex', [AgentController::class, 'agentlist_update_ajex']);
     Route::get('/agentedit/{id}', [AgentController::class, 'agentedit']);

     Route::get('/agentcomission/{id}', [AgentController::class, 'agentcomission'])->name('agentcomission');
     Route::post('/agentcomissionajax/{id}', [AgentController::class, 'agentcomissionajax']);
     
});
