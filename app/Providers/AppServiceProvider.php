<?php

namespace App\Providers;

use App\Constants\Enum;
use App\Http\Resources\NotificationResource;
use App\Models\Constant;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
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
//        view()->share('constants', Constant::query()->get());
        view()->share('settings', Setting::query()->get());

    }
}
