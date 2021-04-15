<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGUProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('gu_products')) {
            Schema::create('gu_products', function (Blueprint $table) {
                $table -> bigIncrements('id');
                $table -> unsignedMediumInteger('product_id');
                $table -> string('name');
                $table -> unsignedBigInteger('user_id');
                $table -> timestamps();

                $table -> foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gu_products');
    }
}
