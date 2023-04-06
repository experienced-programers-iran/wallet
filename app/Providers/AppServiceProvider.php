<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

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

        // Log all query in a request
        if (app()->environment('local')) {
            DB::listen(function ($query) {
                $array = array_map(function ($item) {
                    return is_object($item) || is_array($item) ? json_encode($item) : $item;
                }, collect($query->bindings)->toArray());

                File::append(
                    storage_path('/logs/query.log'),
                    $query->sql .
                    ' [' . implode(', ', $array) . '] ' . 'time:' . $query->time . PHP_EOL
                );
            });
        }
    }
}
