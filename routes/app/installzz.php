<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Office\StarterController;

Route::group(['domain' => ''], function() {
    Route::redirect('/', 'install', 301);
    Route::prefix('install')->name('install.')->group(function(){
        Route::get('',[StarterController::class, 'index'])->name('index');
        Route::post('let-start',[StarterController::class, 'do_start'])->name('let_start');
        Route::get('app-requirements',[StarterController::class, 'index_app_requirements'])->name('index_app_requirements');
        Route::post('check-app-requirements',[StarterController::class, 'check_requirements'])->name('do_app_requirements');
        Route::get('corporate-slogan',[StarterController::class, 'index_slogan'])->name('index_slogan');
        Route::post('check-slogan',[StarterController::class, 'check_slogan'])->name('check_slogan');
        Route::get('app-credentials',[StarterController::class, 'index_env'])->name('index_env');
        Route::post('check-connection',[StarterController::class, 'check_connection'])->name('check_connection');
        Route::get('app-migration',[StarterController::class, 'index_migrate'])->name('index_migrate');
        Route::post('start-migrate',[StarterController::class, 'start_migrate'])->name('start_migrate');
        Route::get('app-settings',[StarterController::class, 'index_setting'])->name('index_setting');
    });
});