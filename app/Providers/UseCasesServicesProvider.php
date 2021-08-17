<?php

namespace App\Providers;

use App\UseCases\Bookings\CreateBookingsUseCase;
use App\UseCases\Bookings\IndexBookingsUseCase;
use App\UseCases\Bookings\StoreBookingsUseCase;
use App\UseCases\Contracts\Bookings\CreateBookingsUseCaseInterface;
use App\UseCases\Contracts\Bookings\IndexBookingsUseCaseInterface;
use App\UseCases\Contracts\Bookings\StoreBookingsUseCaseInterface;
use App\UseCases\Contracts\Residents\ChangeStatusResidentsUseCaseInterface;
use App\UseCases\Contracts\Residents\DeleteResidentsUseCaseInterface;
use App\UseCases\Contracts\Residents\EditResidentsUseCaseInterface;
use App\UseCases\Contracts\Residents\StoreResidentsUseCaseInterface;
use App\UseCases\Contracts\Residents\UpdateResidentsUseCaseInterface;
use App\UseCases\Contracts\Services\DeleteServiceUseCaseInterface;
use App\UseCases\Contracts\Services\EditServiceUseCaseInterface;
use App\UseCases\Contracts\Services\IndexServiceUseCaseInterface;
use App\UseCases\Contracts\Services\StoreServiceUseCaseInterface;
use App\UseCases\Contracts\Services\UpdateServiceUseCaseInterface;
use App\UseCases\Contracts\StoreAdminrecepsUseCaseInterface;
use App\UseCases\Residents\ChangeStatusResidentsUseCase;
use App\UseCases\Residents\DeleteResidentsUseCase;
use App\UseCases\Residents\EditResidentsUseCase;
use App\UseCases\Residents\StoreResidentsUseCase;
use App\UseCases\Residents\UpdateResidentsUseCase;
use App\UseCases\Services\DeleteServiceUseCase;
use App\UseCases\Services\EditServiceUseCase;
use App\UseCases\Services\IndexServiceUseCase;
use App\UseCases\Services\StoreServiceUseCase;
use App\UseCases\Services\UpdateServiceUseCase;
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
        StoreAdminrecepsUseCaseInterface::class => StoreAdminrecepsUseCase::class,
        StoreResidentsUseCaseInterface::class => StoreResidentsUseCase::class,
        ChangeStatusResidentsUseCaseInterface::class => ChangeStatusResidentsUseCase::class,
        EditResidentsUseCaseInterface::class => EditResidentsUseCase::class,
        UpdateResidentsUseCaseInterface::class => UpdateResidentsUseCase::class,
        DeleteResidentsUseCaseInterface::class => DeleteResidentsUseCase::class,
        StoreServiceUseCaseInterface::class => StoreServiceUseCase::class,
        IndexServiceUseCaseInterface::class => IndexServiceUseCase::class,
        EditServiceUseCaseInterface::class => EditServiceUseCase::class,
        UpdateServiceUseCaseInterface::class => UpdateServiceUseCase::class,
        DeleteServiceUseCaseInterface::class => DeleteServiceUseCase::class,
        CreateBookingsUseCaseInterface::class => CreateBookingsUseCase::class,
        StoreBookingsUseCaseInterface::class => StoreBookingsUseCase::class,
        IndexBookingsUseCaseInterface::class => IndexBookingsUseCase::class
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
