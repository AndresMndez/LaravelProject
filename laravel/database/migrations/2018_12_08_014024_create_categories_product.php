<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('category_product', function (Blueprint $table) {
        $table->Increments('id');
        $table->timestamps();
        $table->smallInteger('product_id')->unsigned();
        $table->tinyInteger('category_id')->unsigned();
        $table->softDeletes('deleted_at')->nullable()->default(null);
        $table->foreign('product_id')->references('id')->on('products');
        $table->foreign('category_id')->references('id')->on('categories');
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
      Schema::dropIfExists('category_product');
    }
}
