<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        if (env('VERCEL')) {
            URL::forceScheme('https');

            $dbPath = '/tmp/database.sqlite';
            if (!file_exists($dbPath)) {
                touch($dbPath);
                Artisan::call('migrate', ['--force' => true]);
            }
        }

        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('users')) {
                \App\Models\User::firstOrCreate(
                    ['email' => 'admin@pasirbaru.go.id'],
                    [
                        'name' => 'Admin Perangkat Desa',
                        'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
                    ]
                );
            }
        } catch (\Exception $e) {
            // Suppress exception during initial setup/build
        }
    }
}
