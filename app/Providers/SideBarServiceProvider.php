<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

use App\Models\CampaignModel as CampaignModel;

class SideBarServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('public.partials.header', function($view){

            // Auth::user();

            $view->with([
                'campaigns' => CampaignModel::all()
            ]);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}