<?php
// app/Models/Wilayah.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'wilayah';

    protected $fillable = ['wilayah', 'data']; // Tambahkan 'koordinat' ke fillable

    public function iku()
    {
        return $this->hasMany(IKU::class);
    }
}
