<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OvertimeRequests;
use App\Http\Controllers\API\Accounts;
use App\Http\Controllers\API\Delegates;
use App\Http\Controllers\API\Competencies;
use App\Http\Controllers\API\Logs;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

// Overtime Requests
Route::prefix('request')->name('api.request.')->group(function () {
    
    Route::get('filters', [OvertimeRequests::class, 'filters'])
        ->name('filters');

    Route::match(['get', 'post'], 'list', [OvertimeRequests::class, 'list'])
        ->middleware('throttle:60,1')
        ->name('list');

    Route::get('store', [OvertimeRequests::class, 'store'])
        ->name('store');

    Route::get('show/{overtimeRequest}', [OvertimeRequests::class, 'show'])
        ->name('show');

    Route::get('update/{overtimeRequest}', [OvertimeRequests::class, 'update'])
        ->name('update');

    Route::get('destroy/{overtimeRequest}', [OvertimeRequests::class, 'destroy'])
        ->name('destroy');

    Route::get('approve/{overtimeRequest}/cat/{lvl?}/status/{status?}/via/{via?}', [OvertimeRequests::class, 'approve'])
        ->name('approve');

    Route::get('reject/{overtimeRequest}/cat/{lvl?}/status/{status?}/via/{via?}', [OvertimeRequests::class, 'reject'])
        ->name('reject');
    
    Route::get('changeFlow/{overtimeRequest}/cat/{lvl?}/status/{status?}/via/{via?}', [OvertimeRequests::class, 'changeFlow'])
        ->name('changeFlow');
});

// Accounts
Route::prefix('account')->name('api.account.')->group(function () {
    
    Route::get('store', [Accounts::class, 'store'])
        ->name('store');
    
    Route::get('show/{Account}/{location}', [Accounts::class, 'show'])
        ->name('show');
        
    Route::get('update/{Account}/{location}', [Accounts::class, 'update'])
        ->name('update');

    Route::get('destroy/{Account}/{location}', [Accounts::class, 'destroy'])
        ->name('destroy');
});

// Delegates
Route::prefix('delegate')->name('api.delegate.')->group(function () {
    
    Route::get('store', [Delegates::class, 'store'])
        ->name('store');
        
    Route::get('show/{user_intranet}/{delegate_intranet}', [Delegates::class, 'show'])
        ->name('show');
        
    Route::get('update/{user_intranet}/{delegate_intranet}', [Delegates::class, 'update'])
        ->name('update');

    Route::get('destroy/{user_intranet}/{delegate_intranet}', [Delegates::class, 'destroy'])
        ->name('destroy');
});

// Competencies
Route::prefix('competency')->name('api.competency.')->group(function () {
    
    Route::get('store', [Competencies::class, 'store'])
        ->name('store');

    Route::get('show/{competency}/{approver}', [Competencies::class, 'show'])
        ->name('show');

    Route::get('update/{competency}/{approver}', [Competencies::class, 'update'])
        ->name('update');

    Route::get('destroy/{competency}/{approver}', [Competencies::class, 'destroy'])
        ->name('destroy');
});

// Logs
Route::prefix('log')->name('api.log.')->group(function () {
    
    Route::match(['get', 'post'], 'list', [Logs::class, 'list'])
        ->middleware('throttle:60,1')
        ->name('list');
    
    Route::get('store', [Logs::class, 'store'])
        ->name('store');
    
    Route::get('show/{competency}/{approver}', [Logs::class, 'show'])
        ->name('show');
    
    Route::get('update/{competency}/{approver}', [Logs::class, 'update'])
        ->name('update');
    
    Route::get('destroy/{competency}/{approver}', [Logs::class, 'destroy'])
        ->name('destroy');
});