<?php

namespace Modules\Rotas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'employees',
        'workspace',
        'created_by'
    ];

    protected static function newFactory()
    {
        return \Modules\Rotas\Database\factories\LocationFactory::new();

    }

    public function getCountEmployees() {
        $id = $this->id;

        $role_employee_count = User::whereRaw('FIND_IN_SET('.$id.', id)')->get()->count();
        return $role_employee_count.' Employees';
    }




}
