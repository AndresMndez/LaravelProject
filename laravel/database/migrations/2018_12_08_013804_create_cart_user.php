<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_cart', function (Blueprint $table){
        $table->Increments('id');
        $table->timestamps();
        $table->Integer('user_id')->unsigned();
        $table->Integer('cart_id')->unsigned();
        $table->softDeletes('deleted_at')->nullable()->default(null);
        $table->foreign('user_id')->references('id')->on('users');
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
      Schema::dropIfExists('cart_user');
    }
}
