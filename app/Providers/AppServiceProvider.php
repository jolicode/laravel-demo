<?php

declare(strict_types=1);

namespace App\Providers;

use App\Enums\Role;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('search', function (string $column, string $value) {
            /* @phpstan-ignore-next-line */ // $this is an instance of Builder, not AppServiceProvider like Phpstan thinks
            return $value ? $this->where($column, 'like', "%{$value}%") : $this;
        });

        Gate::define('admin', function ($user) {
            return $user->roles->contains(Role::ADMIN);
        });
    }
}
