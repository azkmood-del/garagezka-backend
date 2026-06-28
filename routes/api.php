<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ServiceHistoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API Vehicle
Route::apiResource('vehicles', VehicleController::class);

// API Service
Route::apiResource('services', ServiceController::class);

// API Booking
Route::apiResource('bookings', BookingController::class);

// API Notification
Route::apiResource('notifications', NotificationController::class);

// API Service History
Route::apiResource('service-histories', ServiceHistoryController::class);