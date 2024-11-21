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
        Schema::table('wilayah', function (Blueprint $table) {
            $table->longText('data')->change(); // Mengubah tipe kolom 'data' menjadi LONGTEXT
        });
    }

    public function down()
    {
        Schema::table('wilayah', function (Blueprint $table) {
            $table->string('data', 255)->change(); // Mengembalikan tipe kolom 'data' ke string dengan panjang default jika migrasi di-rollback
        });
    }
};
