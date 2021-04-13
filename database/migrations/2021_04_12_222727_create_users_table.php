<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table -> bigIncrements('id');
                $table -> string('name', 255) -> nullable($value = true);
                $table -> string('email', 255) -> unique();
                $table -> string('password', 255);
                $table -> rememberToken();
                $table -> timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
