<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users'); // VALIDASI KALO tabel SUDAH ADA
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',50)->unique();
            // $table->index('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');  // INI BUAT ROLLBACK

    }
}
