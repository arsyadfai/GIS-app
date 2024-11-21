<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('iku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wilayah_id')->constrained('wilayah')->onDelete('cascade'); // Relasi ke Wilayah
            $table->decimal('ipm', 5, 2); // Indeks Pembangunan Manusia (IPM)
            $table->decimal('pertumbuhan_ekonomi', 5, 2);
            $table->decimal('inflasi', 5, 2);
            $table->decimal('indeks_gizi', 5, 2);
            $table->decimal('pdrb', 12, 2); // PDRB
            $table->decimal('tingkat_pengangguran_terbuka', 5, 2);
            $table->decimal('nilai_tukar_petani', 5, 2);
            $table->decimal('angka_kemiskinan', 5, 2);
            $table->decimal('indeks_pembangunan_gender', 5, 2);
            $table->year('tahun'); // Tahun
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_k_u_s');
    }
};
