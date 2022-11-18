<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use DateTime;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    const DATE_FORMAT = "Y/m/d H:i:s";

    function __construct(){
        $this->product_table = app(Product::class)->getTable();
        $this->user_table = app(User::class)->getTable();
        Log::info("El nombre de la tabla del modelo producto es $this->product_table");
    }

    public function getCurrentDate(){

    }
    public function index()
    {
        $products = Product::all();
        $products_get = Product::where("id", ">" , 0)->whereIn("id", [1, 2])->orderBy("id")->take(1)->get();
        Log::info("Products Get");
        Log::info($products_get);
        Log::error($products_get->count());
        
        $date_format = "Y/m/d H:i:s";
        $date_from = DateTime::createFromFormat($date_format, "2022/11/15 11:02:10");
        $now = date($date_format);
        Log::info($date_from->format($date_format));
        Log::info($now);
        
        $products_created = Product::whereBetween("created", [$date_from, $now])->orderBy("created")->orWhere("name", "Jabon Foca")->take(1)->get();
        Log::warning($products_created);

        $products_like = Product::where("name", "like", "%Jabon%")->get();
        Log::info("Products Like");
        Log::info($products_like);
        Log::info($products_like->count());

        $products_and = Product::where([
            ["id", "=", 1],
            ["name", "=", "Picafresa"]
        ])->take(1)->get();
        Log::info("Products And");
        Log::info($products_and);
        
        $products_join = DB::table($this->product_table)
            ->join("users", "$this->product_table.created_by", "=", "$this->user_table.id")
            ->select(
                "$this->product_table.name As product_name",
                "$this->product_table.description As product_description",
                "$this->product_table.price As product_price",
                "$this->user_table.email as user_email"
            )
            ->where("$this->user_table.email", "=", "jesuslive1970@gmail.com")
            ->take(2)
            ->get();
        Log::info("Join");

        foreach($products_join as $product){
            $product_all_info = "$product->product_name en presentación $product->product_description con un precio de $product->product_price";
            Log::info($product_all_info);
            if (strtolower($product->product_name) == "picafresa"){
                Log::info("Esta es la picafresa");
            }
        }

        Log::info($products_join->count());
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
