<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('kontaks')) { // VALIDASI KALO tabel SUDAH ADA
            Schema::create('kontaks', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama'); //membuat kolom nama
                $table->string('email'); //membuat kolom email
                $table->string('nohp'); //membuat kolom no hp
                $table->text('alamat'); //membuat kolom alamat dengan tipe text
                $table->timestamps(); //membuat kolom created_at dan updated_at sebagai fungsi dasar laravel
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
        Schema::dropIfExists('kontaks');
    }
}
