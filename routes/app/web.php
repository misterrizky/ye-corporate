<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Web\MainController;

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

Route::group(['domain' => ''], function() {
    Route::prefix('')->name('web.')->group(function(){
        Route::get('',[MainController::class, 'index'])->name('home');
        Route::post('subscribe',[MainController::class, 'subscribe'])->name('subscribe');
        Route::post('send_messages',[MainController::class, 'send_messages'])->name('send_messages');
        Route::get('about',[MainController::class, 'about'])->name('about');
        Route::get('service',[MainController::class, 'service'])->name('service');
        Route::get('case-studies',[MainController::class, 'case'])->name('case');
        Route::get('case-studies/{project:slug}',[MainController::class, 'show_case'])->name('show_case');
        Route::get('contact',[MainController::class, 'contact'])->name('contact');
        Route::get('terms-of-use',[MainController::class, 'terms_use'])->name('terms-use');
        Route::get('privacy-policy',[MainController::class, 'privacy_policy'])->name('privacy-policy');
        Route::get('identify',[MainController::class, 'identify'])->name('identify');
        Route::resource('career',CareerController::class);
        Route::get('career/{career:slug}',[CareerController::class, 'show'])->name('career.show');
        Route::get('lang/{language}',[MainController::class, 'switch'])->name('switch.lang');
    });
    Route::get('migrate', function(){
        Artisan::call('migrate');
        return response()->json([
            'alert' => 'success',
            'message' => 'Migrated!'
        ]);
    })->name('migrate');
    Route::get('db-seed', function(){
        Artisan::call('db:seed');
        return response()->json([
            'alert' => 'success',
            'message' => 'DB Seed!'
        ]);
    })->name('db.seed');
    Route::get('storage-link', function(){
        Artisan::call('storage:link');
        return response()->json([
            'alert' => 'success',
            'message' => 'Storage Linked!'
        ]);
    })->name('storage.link');
});