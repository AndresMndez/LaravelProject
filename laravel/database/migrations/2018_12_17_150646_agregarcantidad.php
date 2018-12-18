<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Agregarcantidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cart_product', function (Blueprint $table) {
        $table->Integer('quantity')->nullable()->unsigned();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('cart_product', function (Blueprint $table) {
        $table->dropColumn('quantity');
      });
    }
}
