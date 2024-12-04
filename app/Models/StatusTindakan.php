<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTindakan extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'status_tindakans';

    // Tentukan kolom mana saja yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'nama_tindakan',
        'status',
        'deskripsi',
        'rekomendasi_id',
    ];

    /**
     * Relasi dengan model Rekomendasi (status tindakan memiliki rekomendasi)
     */
    public function rekomendasi()
    {
        return $this->belongsTo(Rekomendasi::class); // Relasi ke tabel rekomendasi
    }
}
