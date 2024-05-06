<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoDocumento extends Model
{
    use HasFactory;

    protected $table = 'g_estadodocumento'; // Specify the table name
    public $timestamps = false; // Assume the table does not manage timestamps

    protected $primaryKey = 'id'; // Set the primary key
    protected $keyType = 'int'; // Define the type of the primary key
    public $incrementing = true; // The primary key is auto-incrementing

    protected $fillable = [
        'descripcion' // Allow mass assignment on 'descripcion'
    ];

    // No need to define $guarded if $fillable is correctly defined
}
