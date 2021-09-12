<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->integer('best_offer')->default(0);
            $table->integer('product_id')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->integer('best_rank')->default(1);         
            $table->integer('state')->default(0);       
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
      //  $table->foreignId('product_id')->nullable()->references('id')->on('products');
      //  $table->foreignId('buyer_id')->nullable()->references('id')->on('users');    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
