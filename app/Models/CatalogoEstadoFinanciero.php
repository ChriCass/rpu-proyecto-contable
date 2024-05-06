<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoEstadoFinanciero extends Model
{
    use HasFactory;

    protected $table = 's_tabla22_catalogodeestadosfinancieros';  // Specify the exact table name
    public $timestamps = false;  // Assume the table doesn't manage timestamps

    protected $primaryKey = 'N';  // Set the primary key
    protected $keyType = 'string';  // Define the primary key type
    public $incrementing = false;  // Indicate that the primary key is not auto-incrementing

    protected $fillable = [
        'N', 'DESCRIPCION'  // Allow mass assignment on these fields
    ];

    // No need for $guarded if $fillable is correctly defined unless extra security is needed
}
