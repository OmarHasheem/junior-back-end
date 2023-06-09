<?php

use App\Http\Controllers\MarketingControllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::controller(EmailController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        // Route::get('/emails/{id}', 'show')->middleware('permission:show email');
        // Route::get('/emails', 'index')->middleware('permission:index email');
        // Route::post('/emails', 'store')->middleware('permission:store email');
        // Route::put('/emails/{id}', 'update')->middleware('permission:update email');
        // Route::delete('/emails/{id}', 'destroy')->middleware('permission:destroy email');

        Route::get('/emails/{id}', 'show');
        Route::get('/emails', 'index');
        Route::post('/emails', 'store');
        Route::put('/emails/{id}', 'update');
        Route::delete('/emails/{id}', 'destroy');
        Route::post('/emails/attachEmailToLead/{id}', 'attachEmailToLead');
        Route::post('/emails/detachEmailToLead/{id}', 'detachEmailToLead');
    });
});
