<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('file')) { // VALIDASI KALO tabel SUDAH ADA
            Schema::create('file', function (Blueprint $table) {
                $table->increments('id');
                  $table->char('name'); //membuat kolom nama
                  $table->text('file'); //membuat kolom email
                  $table->timestamp('created_at')->nullable();
                  $table->timestamp('updated_at')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('file');
    }
}
