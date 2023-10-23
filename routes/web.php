<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tg/getMe', [App\Http\Controllers\TelegramController::class, 'getMe'])->name('telegram.getMe');
Route::get('/tg/setWebhook', [App\Http\Controllers\TelegramController::class, 'setWebhook'])->name('telegram.setWebhook');
Route::get('/tg/removeWebhook', [App\Http\Controllers\TelegramController::class, 'removeWebhook'])->name('telegram.removeWebhook');
Route::get('/tg/getWebhookInfo', [App\Http\Controllers\TelegramController::class, 'getWebhookInfo'])->name('telegram.getWebhookInfo');
Route::post('/tg/handle', [App\Http\Controllers\TelegramController::class, 'handleRequest'])->name('telegram.handleRequest');
