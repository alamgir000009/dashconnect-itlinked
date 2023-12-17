<?php

namespace Modules\Rotas\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposer extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */

    public function boot(){

        view()->composer(['plans*','settings*'], function ($view) {
            if(\Auth::check())
            {
                $active_module =  ActivatedModule();
                $dependency = explode(',','Rotas');

                if(\Auth::user()->type == 'super admin' || !empty(array_intersect($dependency,$active_module)))
                {
                    $view->getFactory()->startPush('rotas_setting_sidebar', view('rotas::setting.sidebar'));
                    $view->getFactory()->startPush('rotas_setting_sidebar_div', view('rotas::setting.nav_containt_div'));
                }
            }


        });
    }


    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
