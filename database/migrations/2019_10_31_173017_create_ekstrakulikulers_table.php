<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkstrakulikulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekstrakulikulers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('pelatih');
            $table->string('jadwal');
            $table->string('koordinator');
            $table->string('foto');
            $table->text('keterangan');
            $table->integer('sekbid_id');
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
        Schema::dropIfExists('ekstakulikulers');
    }
}
