<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OvertimeRequests;
use App\Http\Controllers\API\Accounts;
use App\Http\Controllers\API\Delegates;
use App\Http\Controllers\API\Competencies;
use App\Http\Controllers\API\Logs;
use App\Http\Controllers\API\Locations;

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

    Route::post('filters', [OvertimeRequests::class, 'filters'])
        ->name('filters');

    Route::post('filters/{type?}', [OvertimeRequests::class, 'filters'])
        ->name('filtersByType');

    Route::match(['get', 'post'], 'formData/{type?}', [OvertimeRequests::class, 'formData'])
        ->name('formData');

    Route::match(['get', 'post'], 'list', [OvertimeRequests::class, 'index'])
        ->middleware('throttle:60,1')
        ->name('list');

    Route::post('store', [OvertimeRequests::class, 'store'])
        ->name('store');

    Route::post('show/{overtimeRequest}', [OvertimeRequests::class, 'show'])
        ->name('show');

    Route::post('update/{overtimeRequest}', [OvertimeRequests::class, 'update'])
        ->name('update');

    Route::post('destroy/{overtimeRequest}', [OvertimeRequests::class, 'destroy'])
        ->name('destroy');

    Route::post('approve/{overtimeRequest}/cat/{lvl?}/status/{status?}/via/{via?}', [OvertimeRequests::class, 'approve'])
        ->name('approve');

    Route::post('reject/{overtimeRequest}/cat/{lvl?}/status/{status?}/via/{via?}', [OvertimeRequests::class, 'reject'])
        ->name('reject');
    
    Route::post('changeFlow/{overtimeRequest}/cat/{lvl?}/status/{status?}/via/{via?}', [OvertimeRequests::class, 'changeFlow'])
        ->name('changeFlow');
});

// Accounts
Route::prefix('account')->name('api.account.')->group(function () {

    Route::post('filters', [Accounts::class, 'filters'])
        ->name('filters');

    Route::post('filters/{type?}', [Accounts::class, 'filters'])
        ->name('filtersByType');

    Route::post('formData', [Accounts::class, 'formData'])
        ->name('formData');

    Route::match(['get', 'post'], 'list', [Accounts::class, 'index'])
        ->middleware('throttle:60,1')
        ->name('list');
    
    Route::post('store', [Accounts::class, 'store'])
        ->name('store');
    
    Route::post('show/{Account}/{location}', [Accounts::class, 'show'])
        ->name('show');
        
    Route::post('update/{Account}/{location}', [Accounts::class, 'update'])
        ->name('update');

    Route::post('destroy/{Account}/{location}', [Accounts::class, 'destroy'])
        ->name('destroy');
});

// Delegates
Route::prefix('delegate')->name('api.delegate.')->group(function () {

    Route::post('filters', [Delegates::class, 'filters'])
        ->name('filters');

    Route::post('filters/{type?}', [Delegates::class, 'filters'])
        ->name('filtersByType');

    Route::post('formData', [Delegates::class, 'formData'])
        ->name('formData');

    Route::match(['get', 'post'], 'list', [Delegates::class, 'index'])
        ->middleware('throttle:60,1')
        ->name('list');
    
    Route::post('store', [Delegates::class, 'store'])
        ->name('store');
        
    Route::post('show/{user_intranet}/{delegate_intranet}', [Delegates::class, 'show'])
        ->name('show');
        
    Route::post('update/{user_intranet}/{delegate_intranet}', [Delegates::class, 'update'])
        ->name('update');

    Route::post('destroy/{user_intranet}/{delegate_intranet}', [Delegates::class, 'destroy'])
        ->name('destroy');
});

// Competencies
Route::prefix('competency')->name('api.competency.')->group(function () {

    Route::post('filters', [Competencies::class, 'filters'])
        ->name('filters');

    Route::post('filters/{type?}', [Competencies::class, 'filters'])
        ->name('filtersByType');

    Route::post('formData', [Competencies::class, 'formData'])
        ->name('formData');

    Route::match(['get', 'post'], 'list', [Competencies::class, 'index'])
        ->middleware('throttle:60,1')
        ->name('list');
    
    Route::post('store', [Competencies::class, 'store'])
        ->name('store');

    Route::post('show/{competency}/{approver}', [Competencies::class, 'show'])
        ->name('show');

    Route::post('update/{competency}/{approver}', [Competencies::class, 'update'])
        ->name('update');

    Route::post('destroy/{competency}/{approver}', [Competencies::class, 'destroy'])
        ->name('destroy');
});

// Locations
Route::prefix('location')->name('api.location.')->group(function () {

    Route::post('filters', [Locations::class, 'filters'])
        ->name('filters');

    Route::post('filters/{type?}', [Locations::class, 'filters'])
        ->name('filtersByType');

    Route::post('formData', [Locations::class, 'formData'])
        ->name('formData');

    Route::match(['get', 'post'], 'list', [Locations::class, 'index'])
        ->middleware('throttle:60,1')
        ->name('list');
    
    Route::post('store', [Locations::class, 'store'])
        ->name('store');

    Route::post('show/{location}/{approver}', [Locations::class, 'show'])
        ->name('show');

    Route::post('update/{location}/{approver}', [Locations::class, 'update'])
        ->name('update');

    Route::post('destroy/{location}/{approver}', [Locations::class, 'destroy'])
        ->name('destroy');
});

// Logs
Route::prefix('log')->name('api.log.')->group(function () {

    Route::post('filters', [Logs::class, 'filters'])
        ->name('filters');

    Route::post('filters/{type?}', [Log::class, 'filters'])
        ->name('filtersByType');

    Route::post('formData', [Log::class, 'formData'])
        ->name('formData');

    Route::match(['get', 'post'], 'list', [Logs::class, 'index'])
        ->middleware('throttle:60,1')
        ->name('list');
    
    Route::post('store', [Logs::class, 'store'])
        ->name('store');
    
    Route::post('show/{competency}/{approver}', [Logs::class, 'show'])
        ->name('show');
    
    Route::post('update/{competency}/{approver}', [Logs::class, 'update'])
        ->name('update');
    
    Route::post('destroy/{competency}/{approver}', [Logs::class, 'destroy'])
        ->name('destroy');
});