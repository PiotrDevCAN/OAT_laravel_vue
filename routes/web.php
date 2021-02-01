<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;

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
// Overtime Requests
Route::prefix('request')
    ->middleware('auth')
    ->name('request.')
    ->group(function () {

        // Show the form for editing the specified resource.
        Route::get('edit/{overtimeRequest?}', function ($overtimeRequest = null) {
            // return $name;
        })
        ->name('edit');
    
    });

// Vue
Route::get('/{any}', [Index::class, 'index'])->where('any', '.*');