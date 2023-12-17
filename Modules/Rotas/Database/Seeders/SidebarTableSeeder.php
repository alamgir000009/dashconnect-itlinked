<?php

namespace Modules\Rotas\Database\Seeders;

use App\Models\Sidebar;
use App\Models\sidebarMenuDisable;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SidebarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $dashboard = Sidebar::where('title',__('Dashboard'))->where('parent_id',0)->where('type','company')->first();
        $rotas_dash = Sidebar::where('title',__('Rotas Dashboard'))->where('parent_id',$dashboard->id)->where('type','company')->first();
        if(!$rotas_dash)
        {
            $rotas_dash =  Sidebar::create( [
                'title' => 'Rotas Dashboard',
                'icon' => '',
                'parent_id' => $dashboard->id,
                'sort_order' => 80,
                'route' => 'rotas.dashboard',
                'permissions' => 'rotas dashboard manage',
                'type' => 'company',
                'module' => 'Rotas',
            ]);
        }

        $check = Sidebar::where('title',__('Rotas'))->where('parent_id',0)->where('type','company')->first();
        if($check == null)
        {
            $check = Sidebar::create( [
                'title' => 'Rotas',
                'icon' => 'ti ti-layout-grid-add',
                'parent_id' => 0,
                'sort_order' => 380,
                'route' => '',
                'permissions' => 'rotas manage',
                'module' => 'Rotas',
                'type' => 'company',

            ]);
        }
        $rotas = Sidebar::where('title',__('Rota'))->where('parent_id',$check->id)->where('type','company')->first();
        if($rotas == null)
        {
            Sidebar::create( [
                'title' => 'Rota',
                'icon' => '',
                'parent_id' => $check->id,
                'sort_order' => 10,
                'route' => 'rota.index',
                'permissions' => 'rota manage',
                'module' => 'Rotas',
                'type' => 'company',

            ]);
        }
        $workschedule = Sidebar::where('title',__('Work Schedule'))->where('parent_id',$check->id)->where('type','company')->first();
        if($workschedule == null)
        {
            Sidebar::create( [
                'title' => 'Work Schedule',
                'icon' => '',
                'parent_id' => $check->id,
                'sort_order' => 15,
                'route' => 'rota.workschedule',
                'permissions' => 'rotas work schedule manage',
                'module' => 'Rotas',
                'type' => 'company',

            ]);
        }

        $availability = Sidebar::where('title',__('Availability'))->where('parent_id',$check->id)->where('type','company')->first();
        if($availability == null)
        {
            Sidebar::create( [
                'title' => 'Availability',
                'icon' => '',
                'parent_id' => $check->id,
                'sort_order' => 20,
                'route' => 'availabilitie.index',
                'permissions' => 'availability manage',
                'module' => 'Rotas',
                'type' => 'company',

            ]);
        }

        $employee = Sidebar::where('title',__('Employee'))->where('parent_id',$check->id)->where('type','company')->first();
        if($employee == null)
        {
          $employee =  Sidebar::create([
                'title' => 'Employee',
                'icon' => '',
                'parent_id' => $check->id,
                'sort_order' => 25,
                'route' => 'rotaemployee.index',
                'permissions' => 'rotaemployee manage',
                'module' => 'Rotas',
                'type'=>'company',
        ]);
            // Sidebar Performance Changes
            sidebarMenuDisable::create([
                'sidebar_id'=> $employee->id,
                'module' => 'Hrm'
            ]);
        }
        $leave = Sidebar::where('title',__('Leave'))->where('parent_id',$check->id)->where('type','company')->first();
        if($leave == null)
        {
            $leave = Sidebar::create([
                'title' => 'Leave',
                'icon' => '',
                'parent_id' => $check->id,
                'sort_order' => 30,
                'route' => 'rota-leave.index',
                'permissions' => 'rotaleave manage',
                'module' => 'Rotas',
                'type'=>'company',

            ]);

            // Sidebar Performance Changes
            sidebarMenuDisable::create([
                'sidebar_id'=> $leave->id,
                'module' => 'Hrm'
            ]);
        }

        $Structures = Sidebar::where('title',__('System Setup'))->where('parent_id',$check->id)->where('type','company')->first();
            if($Structures == null)
            {
                $Structures =  Sidebar::create([
                    'title' => 'System Setup',
                    'icon' => '',
                    'parent_id' => $check->id,
                    'sort_order' => 35,
                    'route' => 'branches.index',
                    'permissions' => 'rotabranch manage',
                    'module' => 'Rotas',
                    'type'=>'company',
                ]);

                // Sidebar Performance Changes
                sidebarMenuDisable::create([
                    'sidebar_id'=> $Structures->id,
                    'module' => 'Hrm'
                ]);
            }
        }

        // $this->call("OthersTableSeeder");

}
