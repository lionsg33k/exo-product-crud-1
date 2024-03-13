<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/", [ProductController::class,"index"])->name("home.index");

Route::put("/product/update/{product}", [ProductController::class,"update"])->name("home.update");
Route::post("/product/store", [ProductController::class,"store"])->name("home.store");

Route::delete("/product/delete/{product}",[ProductController::class,"destroy"])->name("home.destroy");

Route::get("/product/buy/{product}",[ProductController::class,"buy"])->name("home.buy");
