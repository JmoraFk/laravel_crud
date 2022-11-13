<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    // Install 
    // npm i vue vue-routers vue-axios
    // npm run dev
    // php artisan make:model Product mcr
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return response()->json([
            "products" => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->post();
        $user = $request->user();
        Log::info($data);
        Log::info($user);
        if(!$user){
            $user = User::where("id", 1)->first();
            Log::info("Se toma el primer usuario por defecto");
        }
        Log::info($user);
        $product = new Product;
        $product = Product::create([
            "name" => $data["name"],
            "description" => $data["description"],
            "price" => $data["price"],
            "created_by" => $user->id
        ]);
        Log::info("Se ha creado correctamente el producto");
        return response()->json([
            "product" => $product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        Log::info("Product object => {$product}");
        return response()->json([
            "product" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $user = $request->user();
        $now = date('Y-m-d H:i:s');
        $product->fill($request->post());
        $product->last_updated = $now;
        $product->updated_by = $user;
        $product->save();
        Log::info("La informacion del producto ha sido actualizada");
        return response()->json([
            "product" => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product_name = $product->name;
        $product->delete();
        $message = "Producto '{$product_name}' eliminado correctamente"; 
        Log::info($message);
        return response()->json([
            "message" => $message
        ]);
    }
}
