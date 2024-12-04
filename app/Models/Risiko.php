<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risiko extends Model
{
    use HasFactory;

    // Menambahkan kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama',      // Nama risiko
        'severity',  // Nilai severity
        'occurrence', // Nilai occurrence
        'detection',  // Nilai detection
        'rpn'        // Nilai RPN
    ];
}
