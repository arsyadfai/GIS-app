<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('iku', function (Blueprint $table) {
            $table->bigInteger('ipm')->change();
            $table->bigInteger('pertumbuhan_ekonomi')->change();
            $table->bigInteger('inflasi')->change();
            $table->bigInteger('indeks_gizi')->change();
            $table->bigInteger('pdrb')->change();
            $table->bigInteger('tingkat_pengangguran_terbuka')->change();
            $table->bigInteger('nilai_tukar_petani')->change();
            $table->bigInteger('angka_kemiskinan')->change();
            $table->bigInteger('indeks_pembangunan_gender')->change();
        });
    }

    public function down()
    {
        Schema::table('iku', function (Blueprint $table) {
            $table->integer('ipm')->change();
            $table->integer('pertumbuhan_ekonomi')->change();
            $table->integer('inflasi')->change();
            $table->integer('indeks_gizi')->change();
            $table->integer('pdrb')->change();
            $table->integer('tingkat_pengangguran_terbuka')->change();
            $table->integer('nilai_tukar_petani')->change();
            $table->integer('angka_kemiskinan')->change();
            $table->integer('indeks_pembangunan_gender')->change();
        });
    }
};
