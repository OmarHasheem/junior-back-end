<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('auth:api')->group(function (){
                Route::middleware('api')
                    ->group(base_path('routes/api/HR/employee.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/HR/department.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/HR/benefit.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/HR/employeeCertificate.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/HR/employeeEducation.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/HR/employeePerformance.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/HR/employeeVacation.php'));



                Route::middleware('api')
                    ->group(base_path('routes/api/Marketing/campaign.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/Marketing/tv.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/Marketing/socialmedia.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/Marketing/event.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/Marketing/lead.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/Marketing/email.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/Marketing/customer.php'));

                Route::middleware('api')
                    ->group(base_path('routes/api/Marketing/pdffile.php'));
            });

            Route::middleware('api')
                ->group(base_path('routes/api/api.php'));

            Route::middleware('web')
                ->prefix('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}