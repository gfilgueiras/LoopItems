<?php

use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

Route::prefix('status')->controller(StatusController::class)->group(function(){
    Route::get('/', 'index');
    Route::post('/', 'create');
});
