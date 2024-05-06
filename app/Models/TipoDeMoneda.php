<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeMoneda extends Model
{
    use HasFactory;

    protected $table = 's_tabla04_tipodemoneda'; // Specify the exact table name
    public $timestamps = false; // Assume the table doesn't manage timestamps

    protected $primaryKey = 'COD'; // Set the primary key
    protected $keyType = 'string'; // Define the primary key type
    public $incrementing = false; // Primary key does not auto-increment

    protected $fillable = [
        'COD', 'DESCRIPCION', 'PAISOZONAR' // Allow mass assignment on these fields
    ];

    // No need for $guarded if $fillable is correctly defined unless extra security is needed
}
