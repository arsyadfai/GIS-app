<?php
// app/Models/IKU.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IKU extends Model
{
    use HasFactory;

    protected $table = 'iku';

    protected $fillable = [
        'wilayah_id',
        'ipm',
        'pertumbuhan_ekonomi',
        'inflasi',
        'indeks_gizi',
        'pdrb',
        'tingkat_pengangguran_terbuka',
        'nilai_tukar_petani',
        'angka_kemiskinan',
        'indeks_pembangunan_gender',
        'tahun'
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}
