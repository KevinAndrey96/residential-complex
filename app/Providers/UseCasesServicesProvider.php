<?php

namespace App\Providers;

use App\UseCases\Contracts\StoreAdminrecepsUseCaseInterface;
use App\UseCases\StoreAdminrecepsUseCase;
use Illuminate\Support\ServiceProvider;

/**
 * Class UseCasesServicesProvider
 * @package App\Providers
 * @author Jose Jorge Armenta <jarmenta@merqueo.com>
 */
class UseCasesServicesProvider extends ServiceProvider
{
    /** @var array */
    protected array $classes = [
        StoreAdminrecepsUseCaseInterface::class => StoreAdminrecepsUseCase::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
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
    public function boot(): void
    {
        //
    }
}
