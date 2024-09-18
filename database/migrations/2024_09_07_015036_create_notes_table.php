<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('proses');
            $table->string('atas_nama');
            $table->string('kendaraan');
            $table->string('no_polisi');
            $table->string('keterangan');
            $table->string('stnk_resmi');
            $table->string('jasa');
            $table->string('lain_1')->nullable();
            $table->string('lain_2')->nullable();
            $table->string('lain_3')->nullable();
            $table->string('lain_4')->nullable();
            $table->string('total');
            $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('notes');
    }
}
