<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntidadFinanciera extends Model
{
    use HasFactory;

    protected $table = 's_tabla03_entidadfinanciera';  // Specify the exact table name
    public $timestamps = false;  // Assume the table doesn't manage timestamps

    protected $primaryKey = 'N';  // Set the primary key
    protected $keyType = 'string';  // Define the primary key type
    public $incrementing = false;  // Primary key does not auto-increment

    protected $fillable = [
        'N', 'DESCRIPCION'  // Allow mass assignment on these fields
    ];

}
