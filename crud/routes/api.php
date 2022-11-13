<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("/product", ProductController::class)->names([
    "index" => "api_index",
    "store" => "api_store",
    "show" => "api_show",
    "update" => "api_update",
    "destroy" => "api_destroy"
])->only([
    "index",
    "store",
    "show",
    "update",
    "destroy"
]);