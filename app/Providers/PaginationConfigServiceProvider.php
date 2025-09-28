<?
// app/Providers/PaginationConfigServiceProvider.php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class PaginationConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Set pagination view
        Config::set('pagination.view', 'pagination::bootstrap-5');

        // Set items per page
        Config::set('pagination.per_page', 10);

        // Register pagination views
        // $this->loadViewsFrom(resource_path('views/vendor/pagination'), 'pagination');
    }

    public function register()
    {
        //
    }
}
