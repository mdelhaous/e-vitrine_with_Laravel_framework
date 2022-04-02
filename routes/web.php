<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\articleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use Faker\Core\File;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class,'home']);
Route::get('/article/{id}', [FrontController::class,'article']);

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('articles',  [articleController::class,'viewAll']);
    Route::get('ajouterArticle', [articleController::class,'viewAdd']);
    Route::get('modifier-article/{id}',[articleController::class,'viewEdit']);
    Route::post('ajouter-article', [articleController::class,'addProduct']);
    Route::post('modifier-article/{id}', [articleController::class,'editProduct']);
    Route::get('supprimer-article/{id}', [articleController::class,'deleteProduct']);

    Route::get('categories', [CategoryController::class,'viewAll']);
    Route::post('ajouter-category', [CategoryController::class,'addCategory']);
    Route::get('supprimer-category/{id}', [CategoryController::class,'deleteCategory']);

    Route::get('admins',  [AdminController::class,'viewAll']);
    Route::post('ajouter-admin',  [AdminController::class,'addAdmin']);
    Route::get('supprimer-admin/{id}', [AdminController::class,'deleteAdmin']);
});




Route::get('storage/{filename}', function ($filename) {
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});