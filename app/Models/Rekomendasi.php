<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini (jika berbeda)
    protected $table = 'rekomendasis';  // Jika nama tabel berbeda, sesuaikan

    // Menentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nama',
        'deskripsi',
        'risiko_id',  // Kolom yang dapat diisi oleh mass assignment
    ];

    // Relasi dengan model Risiko (jika diperlukan)
    public function risiko()
    {
        return $this->belongsTo(Risiko::class);
    }
}
