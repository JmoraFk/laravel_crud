<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->index();
            $table->string("name", 150);
            $table->string("description", 255);
            $table->float("price", 2, 2);
            $table->float("presentation")->nullable();
            $table->foreignIdFor(User::class, "created_by")->onDelete("cascade");
            $table->foreignidFor(User::class, "updated_by")->onDelete("cascade")->nullable();
            $table->datetime("created", $presicion=0)->useCurrent();
            $table->datetime("last_updated", $presicion=0)->nullable();
            $table->enum("stock_status", ["A", "S"])->default("A");
            $table->bigInteger("total_stock")->default(0);
            // $table->string("prueba", 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropColumn("products", "prueba");
        Schema::dropIfExists("products");
    }
};
