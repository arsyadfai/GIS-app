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
            $table->renameColumn('koordinat', 'data'); // Mengganti nama kolom dari 'koordinat' menjadi 'data'
        });
    }

    public function down()
    {
        Schema::table('wilayah', function (Blueprint $table) {
            $table->renameColumn('data', 'koordinat'); // Mengembalikan nama kolom ke 'koordinat' jika migrasi di-rollback
        });
    }
};
