<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LightSamlController;
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
    return view('welcome');
});

Route::get('/lightsaml/auth', [LightSamlController::class, 'authRequest']);
Route::get('/lightsaml/metadata', [LightSamlController::class, 'entityDescriptor']);
Route::get('/lightsaml/login', [LightSamlController::class, 'bindRequest']);
