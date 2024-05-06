<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroTributario extends Model
{
    use HasFactory;

    protected $table = 's_librostributarios_agrcts'; // Specify the table name
    public $timestamps = false; // Assume the table does not manage timestamps

    protected $primaryKey = 'N'; // Set the primary key
    protected $keyType = 'int'; // Define the primary key type
    public $incrementing = false; // Primary key does not auto-increment

    protected $fillable = [
        'N', 'Descripcion' // Allow mass assignment on these fields
    ];

    // No need for $guarded if $fillable is set unless extra security is needed
}
