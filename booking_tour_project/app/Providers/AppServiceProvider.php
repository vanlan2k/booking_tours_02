<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Notification;
use Illuminate\Support\Facades\View;
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
        $categories = Category::where('parent_id', 0)->get();
        $data['categories'] = $categories;
        $notifications = Notification::limit(5)->orderby('id', 'desc')->get();
        $data['notifications'] = $notifications;
        View::share($data);
    }
}
