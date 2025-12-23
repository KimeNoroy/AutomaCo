<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'generation_code',
        'pdf_path',
        'json_path',
        'raw_data'
    ];

    protected $casts = [
        'raw_data' => 'array', // Convierte el JSON a array automáticamente
    ];
}