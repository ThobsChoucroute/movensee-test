<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::redirect("/", "players", 302);
Route::apiResource('players', PlayerController::class);

Route::controller(ContactController::class)->group(function () {
    Route::get("contact", "show")->name("contact.show");
    Route::post("contact", "sendMail")->name("contact.sendMail");
});
