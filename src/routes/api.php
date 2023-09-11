<?php

use App\Http\Controllers\API\V1\ItemController;
use App\Http\Controllers\API\V1\ItemStatisticsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('item', ItemController::class)->only(['index', 'show', 'store']);

Route::get('items/statistics', [ItemStatisticsController::class, 'getStatistics'])->name('items.statistics');
