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

// Mailable
Route::prefix('mailable')
//     ->middleware('auth')
    ->name('mailable.')
    ->group(function () {
        
        Route::prefix('request')
//             ->middleware('auth')
            ->name('request.')
            ->group(function () {
               
                Route::get('retrieved/{overtimeRequest}', function (OvertimeRequest $overtimeRequest) {
                    return new App\Mail\Request\Retrieved($overtimeRequest);
                })
                ->name('retrieved');
                
                Route::get('created/{overtimeRequest}', function (OvertimeRequest $overtimeRequest) {
                    return new App\Mail\Request\Created($overtimeRequest);
                })
                ->name('created');
                
                Route::get('updated/{overtimeRequest}', function (OvertimeRequest $overtimeRequest) {
                    return new App\Mail\Request\Updated($overtimeRequest);
                })
                ->name('updated');
                
                Route::get('deleted/{overtimeRequest}', function (OvertimeRequest $overtimeRequest) {
                    return new App\Mail\Request\Deleted($overtimeRequest);
                })
                ->name('deleted');
                
                Route::get('submitted/{overtimeRequest}', function (OvertimeRequest $overtimeRequest) {
                    return new App\Mail\Request\Submitted($overtimeRequest);
                })
                ->name('submitted');
                
                Route::get('approved/{overtimeRequest}', function (OvertimeRequest $overtimeRequest) {
                    return new App\Mail\Request\Approved($overtimeRequest);
                })
                ->name('approved');
                
                Route::get('rejected/{overtimeRequest}', function (OvertimeRequest $overtimeRequest) {
                    return new App\Mail\Request\Rejected($overtimeRequest);
                })
                ->name('rejected');
                
                Route::get('flowChanged/{overtimeRequest}', function (OvertimeRequest $overtimeRequest) {
                    return new App\Mail\Request\FlowChanged($overtimeRequest);
                })
                ->name('flowChanged');
                
            });
    });

// Vue
Route::get('/{any}', [Index::class, 'index'])->where('any', '.*');