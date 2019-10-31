<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->BigInteger('mapel_id')->unsigned()->change();
            $table->foreign('mapel_id')->references('id')->on('mapels')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('siswas', function (Blueprint $table) {
            $table->BigInteger('jurusan_id')->unsigned()->change();
            $table->foreign('jurusan_id')->references('id')->on('jurusans')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('gudangs', function (Blueprint $table) {
            $table->BigInteger('kategori_id')->unsigned()->change();
            $table->foreign('kategori_id')->references('id')->on('kategoris')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('ekstrakulikulers', function (Blueprint $table) {
            $table->BigInteger('sekbid_id')->unsigned()->change();
            $table->foreign('sekbid_id')->references('id')->on('sekbids')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
