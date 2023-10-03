<?php

namespace App\Providers;

use App\Repositories\Contracts\DetailSpaceOccupations\DetailSpaceOccupationRepositoryInterface;
use App\Repositories\Contracts\ParkingSpaces\ParkingSpaceRepositoryInterface;
use App\Repositories\Contracts\Parkings\ParkingRepositoryInterface;
use App\Repositories\Contracts\Payments\PaymentRepositoryInterface;
use App\Repositories\Contracts\Permissions\PermissionRepositoryInterface;
use App\Repositories\Contracts\Residents\ResidentRepositoryInterface;
use App\Repositories\Contracts\Roles\RoleRepositoryInterface;
use App\Repositories\Contracts\Watchman\WatchmanRepositoryInterface;
use App\Repositories\DetailSpaceOccupations\DetailSpaceOccupationRepository;
use App\Repositories\ParkingSpaces\ParkingSpaceRepository;
use App\Repositories\Parkings\ParkingRepository;
use App\Repositories\Payments\PaymentRepository;
use App\Repositories\Permissions\PermissionRepository;
use App\Repositories\Residents\ResidentRepository;
use App\Repositories\Roles\RoleRepository;
use App\Repositories\Watchman\WatchmanRepository;
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
        ResidentRepositoryInterface::class => ResidentRepository::class,
        ParkingRepositoryInterface::class => ParkingRepository::class,
        ParkingSpaceRepositoryInterface::class => ParkingSpaceRepository::class,
        RoleRepositoryInterface::class => RoleRepository::class,
        PermissionRepositoryInterface::class => PermissionRepository::class,
        WatchmanRepositoryInterface::class => WatchmanRepository::class,
        DetailSpaceOccupationRepositoryInterface::class => DetailSpaceOccupationRepository::class
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
