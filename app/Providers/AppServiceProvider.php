<?php

namespace App\Providers;

use App\Models\Admin\Menu;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*View::share('theme', 'admin-lte');*/

        View::composer("admin.theme.admin-lte.aside", function ($view) {

            $menus = Menu::getMenu(true);

            $view->with('menusComposer', $menus);

        });
        
        View::share('theme', 'admin-lte');

    }
}
