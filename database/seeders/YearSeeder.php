<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Year; // Pastikan model Year diimport

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $years = range(2000, 2024); // Misalnya, range tahun dari 2000 hingga 2024
        foreach ($years as $year) {
            Year::create(['year' => $year]);
        }
    }
}
