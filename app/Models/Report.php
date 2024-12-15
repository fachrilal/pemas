<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports'; // Nama tabel di database

    protected $fillable = [
        'provinsi', 
        'kota', 
        'kecamatan', 
        'kelurahan', 
        'type', 
        'detail', 
        'gambar'
    ];
}
