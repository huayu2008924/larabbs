<?php

namespace App\Providers;

use App\Observers\LinkObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Topic;
use App\Models\Reply;
use App\Models\Link;
use App\Observers\UserObserver;
use App\Observers\TopicObserver;
use App\Observers\ReplyObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		User::observe(UserObserver::class);
		Topic::observe(TopicObserver::class);
        Reply::observe(ReplyObserver::class);
        Link::observe(LinkObserver::class);
        //
        \Horizon::auth(function ($request) {
            // 是否是站长
            return \Auth::user()->hasRole('Founder');
        });
    }
}
