<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for users.
     * Typically used after login for redirect.
     */
    public const HOME = '/home';
    public const ADMIN_HOME = '/admin/dashboard'; // For admins

    /**
     * Bootstrapping any route model bindings or pattern filters.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // ------------------ Web Routes (Users) ------------------
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // ------------------ API Routes (if you have any) ------------------
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }

    /**
     * Configure rate limiting for APIs.
     */
    protected function configureRateLimiting(): void
    {
        // Example if you plan API rate limiting
        // RateLimiter::for('api', function (Request $request) {
        //     return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        // });
    }
}
