<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource("/product",  ProductController::class)->names([
    "index" => "product_get",
    "create" => "product_add",
    "store" => "product_post",
    "show" => "product_show",
    "edit" => "product_edit",
    "update" => "product_update",
    "destroy" => "product_destroy"
])->only([
    "index",
    "create",
    "store"
]);