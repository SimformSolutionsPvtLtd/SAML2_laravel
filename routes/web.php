<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LightSamlController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/lightsaml/auth', [LightSamlController::class, 'authRequest']);
Route::get('/lightsaml/metadata', [LightSamlController::class, 'entityDescriptor']);
Route::get('/lightsaml/login', [LightSamlController::class, 'bindRequest']);

Route::get('/login', \Auth0\Laravel\Http\Controller\Stateful\Login::class)->name('login');
Route::get('/logout', \Auth0\Laravel\Http\Controller\Stateful\Logout::class)->name('logout');
Route::get('/auth0/callback', \Auth0\Laravel\Http\Controller\Stateful\Callback::class)->name('auth0.callback');

Route::get('/', function () {
    if (Auth::check()) {
        return view('auth0.user');
    }
    return view('welcome');
})->middleware(['auth0.authenticate.optional']);
