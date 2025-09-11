<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\HashIdService;
use Exception;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::bind('id', function($hashId){
            try{
                return (new HashIdService())->decode($hashId);
            }catch(Exception $e){
                abort(404, 'No item found with this id!');
            }
        });
    }
}
