<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

//Use Normal Route

//Books 
Route::prefix("/books")->group(function() {
    Route::get("/", [BookController::class, "index"])->name("allBooks");
    Route::get("/{id}", [BookController::class, "oneBook"]);
    Route::post("/create", [BookController::class, "createBook"]);
    Route::put("/edit/{id}", [BookController::class, "editBook"]);
    Route::delete("delete/{id}", [BookController::class, "deleteBook"]);
});

//Authors
Route::prefix("/authors")->group(function() {
    Route::get("/", [AuthorController::class, "index"])->name("allAuthors");
    Route::get("/{id}", [AuthorController::class, "oneAuthor"]);
    Route::post("/create", [AuthorController::class, "createAuthor"]);
    Route::put("/edit/{id}", [AuthorController::class, "editAuthor"]);
    Route::delete("/delete/{id}", [AuthorController::class, "deleteAuthor"]);
});

//Users
Route::prefix("/users")->group(function(){
    Route::get("/", [UserController::class, "index"])->name("allUsers");
    Route::get("/{id}", [UserController::class, "oneUser"]);
    Route::post("/create", [UserController::class, "createUser"]);
    Route::put("/edit/{id}", [UserController::class, "editUser"]);
    Route::delete("delete/{id}", [UserController::class, "deleteUser"]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
