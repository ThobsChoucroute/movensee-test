<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::redirect("/", "players", 302);
Route::apiResource('players', PlayerController::class);
