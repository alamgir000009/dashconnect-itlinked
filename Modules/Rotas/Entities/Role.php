<?php

namespace Modules\Rotas\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User; 

class Role extends Model
{
    use HasFactory;
    protected $table = 'employee_roles';
    protected $fillable = [
        'name',
        'color',
        'default_break',
        'created_by',
        'employees'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Rotas\Database\factories\RoleFactory::new();
    }

    public function getDefaultBreack() {
        $default_break = $this->default_break;
        return (!empty($default_break)) ? $default_break : '0';
    }
    public function getCountEmployees() {
        $id = $this->id;
        $role_employee_count = user::whereRaw('FIND_IN_SET('.$id.',id)')->get()->count();
        return $role_employee_count.' '.__('Employees');
    }
}
