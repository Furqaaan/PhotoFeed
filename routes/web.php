<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

Route::get("/",[AuthController::class,"getLogin"])->name("login");
Route::post("/",[AuthController::class,"doLogin"]);
Route::get("/logout",[AuthController::class,"doLogout"]);

Route::get("/dashboard",[DashboardController::class,"getDashboard"])->name("dashboard")->middleware("authCheck");
Route::post("/doUploadImage",[DashboardController::class,"doUploadImage"])->name("doUploadImage")->middleware("authCheck");
Route::get("/getImages",[DashboardController::class,"getImages"])->name("getImages")->middleware("authCheck");

Route::get("/categories",[CategoryController::class,"viewCategories"])->name("viewCategories")->middleware("authCheck");
Route::get("/getCategories",[CategoryController::class,"getCategories"])->name("getCategories")->middleware("authCheck");
Route::get("/editCategory",[CategoryController::class,"editCategory"])->name("editCategory")->middleware("authCheck");
Route::get("/addCategory",[CategoryController::class,"addCategory"])->name("addCategory")->middleware("authCheck");
Route::get("/deleteCategory",[CategoryController::class,"deleteCategory"])->name("deleteCategory")->middleware("authCheck");