<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaborTarget extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'target',
        'workspace',
        'create_by',
    ];

}
