<?php

namespace Modules\Rotas\Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // slack notification
        $notifications = [
            'New Rota','Rotas Time Change','New Availabilitys','Cancle Rotas','Days Off'
        ];
        $types = [
            'slack','telegram'
        ];
        foreach($types as $t){
            foreach($notifications as $n){
                $ntfy = Notification::where('action',$n)->where('type',$t)->where('module','Rotas')->count();
                if($ntfy == 0){
                    $new = new Notification();
                    $new->action = $n;
                    $new->status = 'on';
                    $new->module = 'Rotas';
                    $new->type = $t;
                    $new->save();
                }
            }
        }

        // twilio notification
        $notifications = [
            'RotaLeave Approve/Reject','New Rota','Rotas Time Change','New Availabilitys','Cancle Rotas','Days Off'
        ];
        $types = [
            'twilio','whatsapp'
        ];
        foreach($types as $t){
            foreach($notifications as $n){
                $ntfy = Notification::where('action',$n)->where('type',$t)->where('module','Rotas')->count();
                if($ntfy == 0){
                    $new = new Notification();
                    $new->action = $n;
                    $new->status = 'on';
                    $new->module = 'Rotas';
                    $new->type = $t;
                    $new->save();
                }
            }
        }

        // email notification
        $notifications = [
            'Rotas'
        ];
        $permissions = [
            'rotas manage',

        ];
            foreach($notifications as $key=>$n){
                $ntfy = Notification::where('action',$n)->where('type','mail')->where('module','Rotas')->count();
                if($ntfy == 0){
                    $new = new Notification();
                    $new->action = $n;
                    $new->status = 'on';
                    $new->permissions = $permissions[$key];
                    $new->module = 'Rotas';
                    $new->type = 'mail';
                    $new->save();
                }
            }


        // $this->call("OthersTableSeeder");
    }
}
