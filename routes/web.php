<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\StudyController;

Route::get('/',      [StudyController::class, 'index']);
Route::get('/list',  [StudyController::class, 'retrieve']);
Route::get('/view',  [StudyController::class, 'load']);
Route::get('/write', [StudyController::class, 'add']);
Route::get('/modify',[StudyController::class, 'modify']);
Route::get('/delete',[StudyController::class, 'remove']);
