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
    return view('index');
});

Route::get('/element', function () {
    return view('basic_elements');
});

Route::get('/blank', function () {
    return view('blank-page');
});

Route::get('/button', function () {
    return view('buttons');
});

Route::get('/chart', function () {
    return view('chartjs');
});

Route::get('/404', function () {
    return view('error-404');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/mdi', function () {
    return view('mdi');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/typography', function () {
    return view('typography');
});

Route::get('/table', function () {
    return view('basic-table');
});

/*--------------------------------------------------------------------*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/queueManagementInput', function () {
    return view('queue-management/input');
    //return view('queue-management/test');
});

Route::post('/queueManagement','App\Http\Controllers\QueueController@preQueue');


/*---- QR Code ----*/
Route::get('/codeGeneratorInput', 'App\Http\Controllers\BillController@bill');
Route::post('/codeGeneratorOutput','App\Http\Controllers\BillController@billView');

Route::get('/readQR', 'App\Http\Controllers\BillController@readQR');
Route::post('/updateStatus', 'App\Http\Controllers\BillController@update');

