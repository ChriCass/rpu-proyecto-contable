<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    use HasFactory;

    protected $table = 'g_meses'; // Specifies the exact table name if not following Laravel's naming conventions
    public $timestamps = false; // Assuming the table doesn't use Laravel's timestamps

    protected $primaryKey = 'N'; // Set the primary key
    protected $keyType = 'string'; // Define the primary key type
    public $incrementing = false; // The primary key is not auto-incrementing

    protected $fillable = [
        'N', 'MES' // Allow mass assignment on these fields
    ];

    // No need for $guarded if $fillable is set unless you need extra security
}
