<?php

namespace Modules\Rotas\Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Artisan;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Artisan::call('cache:clear');
        $permission  = [
            'rotas manage',
            'rotas dashboard manage',
            'rotas work schedule manage',
            'rota manage',
            'rota create',
            'rota edit',
            'rota delete',
            'rota share',
            'rota print',
            'rota publish-week',
            'rota unpublish-week',
            'rota shift-copy',
            'rota copy-week-shift',
            'rota hide/show day off',
            'rota hide/show leave',
            'rota hide/show availability',
            'rota clear week',
            'rota day off',
            'rota send mail',
            'availability manage',
            'availability create',
            'availability edit',
            'availability delete',
            'rotaemployee manage',
            'rotaemployee create',
            'rotaemployee edit',
            'rotaemployee delete',
            'rotaemployee show',
            'rotaemployee import',
            'rotabranch manage',
            'rotabranch create',
            'rotabranch edit',
            'rotabranch delete',
            'rotabranch name edit',
            'rotadepartment manage',
            'rotadepartment create',
            'rotadepartment edit',
            'rotadepartment delete',
            'rotadepartment name edit',
            'rotadesignation manage',
            'rotadesignation create',
            'rotadesignation edit',
            'rotadesignation delete',
            'rotadesignation name edit',
            'rotaleavetype manage',
            'rotaleavetype create',
            'rotaleavetype edit',
            'rotaleavetype delete',
            'rotaleave manage',
            'rotaleave create',
            'rotaleave edit',
            'rotaleave delete',
            'rotaleave approver manage',


        ];

        $company_role = Role::where('name','company')->first();
        foreach ($permission as $key => $value)
        {
            $table = Permission::where('name',$value)->where('module','Rotas')->exists();
            if(!$table)
            {
                Permission::create(
                    [
                        'name' => $value,
                        'guard_name' => 'web',
                        'module' => 'Rotas',
                        'created_by' => 0,
                        "created_at" => date('Y-m-d H:i:s'),
                        "updated_at" => date('Y-m-d H:i:s')
                    ]
                );
                $permission = Permission::findByName($value);
                $company_role->givePermissionTo($permission);
            }
        }

        // $this->call("OthersTableSeeder");
    }
}
