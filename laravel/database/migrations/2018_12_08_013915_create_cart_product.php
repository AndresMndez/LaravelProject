<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cart_product', function (Blueprint $table) {
        $table->Increments('id');
        $table->timestamps();
        $table->smallInteger('product_id')->unsigned();
        $table->Integer('cart_id')->unsigned();
        $table->unsignedDecimal('precio',10,2)->unsigned();
        $table->softDeletes('deleted_at')->nullable()->default(null);
        $table->foreign('product_id')->references('id')->on('products');
        $table->foreign('cart_id')->references('id')->on('carts');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::disableForeignKeyConstraints();
      Schema::dropIfExists('cart_product');
    }
}
