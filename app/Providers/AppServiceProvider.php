<?php

namespace App\Providers;

use App\Models\Reaction;
use App\Models\Thought;
use App\Policies\ReactionPolicy;
use App\Policies\ThoughtPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Thought::class => ThoughtPolicy::class,
        Reaction::class => ReactionPolicy::class,
    ];
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
        $this->registerPolicies();
    }
}
