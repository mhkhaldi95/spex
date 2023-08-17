<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Brands\BrandController;
use App\Http\Controllers\Collections\CollectionController;
use App\Http\Controllers\Constant\ConstantController;
use App\Http\Controllers\Notifications\NotificationController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Settings\ActivityLogController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\StartEndTimeController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\Trips\TripController;
use App\Http\Controllers\PlaceDashboard\Trips\TripController as PlaceTripController;
use App\Http\Controllers\UserManagement\Admins\AdminController;
use App\Http\Controllers\UserManagement\Captains\CaptainController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlaceDashboard\DashboardController as PlaceDashboardController;
use App\Http\Controllers\UserManagement\Admins\AccountSettingsController;
use App\Http\Controllers\UserManagement\Customers\CustomerController;
use App\Http\Controllers\UserManagement\Places\PlaceController;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/brands', function () {
    return view('website.welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'locale'], function () {
    Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('login');
        Route::post('custom-login', [LoginController::class, 'login'])->name('custom-login');
    });
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::group(['prefix' => 'auth'], function () {
            Route::get('logout', [LoginController::class, 'logout'])->name('logout')->withoutMiddleware('admin');
        });


        Route::get('{id}/account', [AccountSettingsController::class, 'create'])->name('admins.account.create')->withoutMiddleware('admin');
        Route::post('account/update-info', [AccountSettingsController::class, 'updateInfo'])->name('admins.account.update-info')->withoutMiddleware('admin');
        Route::post('account/update-email', [AccountSettingsController::class, 'updateEmail'])->name('admins.account.update-email')->withoutMiddleware('admin');
        Route::post('account/update-password', [AccountSettingsController::class, 'updatePassword'])->name('admins.account.update-password')->withoutMiddleware('admin');

        Route::group(['prefix' => 'admins'], function () {
            Route::get('/', [AdminController::class, 'index'])->name('admins.index');
            Route::get('/create/{id?}', [AdminController::class, 'create'])->name('admins.create');
            Route::post('/store/{id?}', [AdminController::class, 'store'])->name('admins.store');
            Route::post('{id}/delete', [AdminController::class, 'delete'])->name('admins.delete');

        });
        Route::group(['prefix' => 'customers'], function () {
            Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
            Route::get('/create/{id?}', [CustomerController::class, 'create'])->name('customers.create');
            Route::post('/store/{id?}', [CustomerController::class, 'store'])->name('customers.store');
            Route::post('{id}/delete', [CustomerController::class, 'delete'])->name('customers.delete');

        });


        Route::group(['prefix' => 'brands'], function () {
            Route::get('/', [BrandController::class, 'index'])->name('brands.index');
            Route::get('/create/{id?}', [BrandController::class, 'create'])->name('brands.create');
            Route::post('/store/{id?}', [BrandController::class, 'store'])->name('brands.store');
            Route::post('{id}/delete', [BrandController::class, 'delete'])->name('brands.delete');
        });

        Route::group(['prefix' => 'collections'], function () {
            Route::get('/', [CollectionController::class, 'index'])->name('collections.index');
            Route::get('/create/{id?}', [CollectionController::class, 'create'])->name('collections.create');
            Route::post('/store/{id?}', [CollectionController::class, 'store'])->name('collections.store');
            Route::post('{id}/delete', [CollectionController::class, 'delete'])->name('collections.delete');
        });

        Route::group(['prefix' => 'products'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/create/{id?}', [ProductController::class, 'create'])->name('products.create');
            Route::post('/store/{id?}', [ProductController::class, 'store'])->name('products.store');
            Route::post('{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
            Route::post('upload-image', [ProductController::class, 'uploadImages'])->name('products.upload.image');
            Route::post('remove-image', [ProductController::class, 'removeImage'])->name('products.remove.image');
        });


        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', [OrderController::class, 'index'])->name('orders.index');
            Route::get('/{id}/show', [OrderController::class, 'show'])->name('orders.show');
            Route::post('{id}/change-status', [OrderController::class, 'changeStatus'])->name('orders.changeStatus');
            Route::post('{id}/delete', [OrderController::class, 'delete'])->name('orders.delete');
        });


        Route::group(['prefix' => 'settings'], function () {
            Route::get('/create/{id?}', [SettingsController::class, 'create'])->name('settings.create');
            Route::post('/store/{id?}', [SettingsController::class, 'store'])->name('settings.store');


            Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
        });


    });


});

Route::get('send-email', function () {
    $user = \Illuminate\Support\Facades\Auth::user(); // or fetch your user data

    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MyEmail($user));

    return "Email sent!";
});
Route::get('notifications/{id}/readAt', function ($id) {

    try {
        $notify = Notification::query()->where('id', $id)->first();
        $notify->update(['read_at' => now()]);
        $page_breadcrumbs = [
            ['page' => route('dashboard.index'), 'title' => 'الرئيسية', 'active' => true],
            ['page' => '#', 'title' => 'الرحلات', 'active' => false],
        ];
        $customers = User::query()->customers()->get();
        $places = User::query()->places()->get();
        $captains = User::query()->captains()->get();
        return redirect()->route('trips.index')->with(
            [
                'page_title' => 'الرئيسية',
                'page_breadcrumbs' => $page_breadcrumbs,
                'customers' => $customers,
                'captains' => $captains,
                'places' => $places,
            ]
        );


    } catch (QueryException $exception) {
        return $this->invalidIntParameter();
    }

})->name('notifications.readAt');
Route::get('notifications/header', [NotificationController::class, 'notificationsHeader'])->name('notifications.header');

