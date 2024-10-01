<?php

use App\Http\Controllers\Api\PlayerController;
use Illuminate\Support\Facades\Route;

Route::name("api.")->group(function () {
    // Players
    Route::controller(PlayerController::class)->group(function () {
        Route::get("players/paginate/{itemsPerPage}", "index_paginate")->name("players.index_paginate");
    });
    Route::apiResource("players", PlayerController::class);
});
