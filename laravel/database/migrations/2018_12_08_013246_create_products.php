<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function (Blueprint $table){
      $table->smallIncrements('id');
      $table->string('name',50)->unique();
      $table->text('description')->nullable()->default(null);
      $table->string('image',100)->nullable();
      $table->string('brand', 30)->nullable();
      $table->float('price', 9, 2);
      $table->timestamps();
      $table->softDeletes('delete_at')->nullable()->default(null);
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
      Schema::dropIfExists('products');
    }
}
