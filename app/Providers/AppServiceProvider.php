<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('search', function (string $column, string $value) {
            /* @phpstan-ignore-next-line */
            return $value ? $this->where($column, 'like', "%{$value}%") : $this;
        });
    }
}
