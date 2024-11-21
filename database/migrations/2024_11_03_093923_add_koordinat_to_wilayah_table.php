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
            $table->string('koordinat')->nullable()->after('wilayah'); // Menambahkan kolom koordinat
        });
    }

    public function down()
    {
        Schema::table('wilayah', function (Blueprint $table) {
            $table->dropColumn('koordinat'); // Menghapus kolom koordinat jika migrasi di-rollback
        });
    }
};
