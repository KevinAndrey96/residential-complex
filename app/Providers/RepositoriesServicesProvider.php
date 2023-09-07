<?php

namespace App\Providers;

use App\Repositories\Contracts\Payments\PaymentRepositoryInterface;
use App\Repositories\Contracts\Residents\ResidentRepositoryInterface;
use App\Repositories\Payments\PaymentRepository;
use App\Repositories\Residents\ResidentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    protected array $classes = [
        PaymentRepositoryInterface::class => PaymentRepository::class,
        ResidentRepositoryInterface::class => ResidentRepository::class
    ];

    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
