<?php

namespace Modules\Rotas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;




class TargetSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'target',
        'workspace',
        'create_by'
    ];
}
