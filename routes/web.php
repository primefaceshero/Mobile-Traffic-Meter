<?php

use Illuminate\Support\Facades\Route;
use Primefaceshero\MobileTrafficMeter\MobileTrafficMeter;
use Primefaceshero\MobileTrafficMeter\Controllers\DemoController;

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

Route::get('/traffic-meter', [DemoController::class, 'index'])->name('index');

Route::get('/totalEvents', [DemoController::class, 'totalEvents'])->name('totalEvents');

Route::get('/faker', function () {
    MobileTrafficMeter::faker();
    return "done";
});

Route::get('/test', function(){
    return view('traffic_meter');
});