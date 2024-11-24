<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

Route::apiResource('hotels', HotelController::class);
Route::apiResource('reservations', ReservationController::class);
Route::apiResource('payments', PaymentController::class);
Route::apiResource('users', UserController::class);
