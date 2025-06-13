<?php

namespace App\Providers;

use App\Models\Typedrinks;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Eloquent\MasterRepository;
use App\Repositories\MasterRepositoryInterface;

use App\Repositories\Eloquent\RolesRepository;
use App\Repositories\RolesRepositoryInterface;

use App\Repositories\Eloquent\UserRepository;
use App\Repositories\UserRepositoryInterface;

use App\Repositories\Eloquent\OrdersRepository;
use App\Repositories\OrdersRepositoryInterface;

use App\Repositories\Eloquent\CustomersRepository;
use App\Repositories\CustomersRepositoryInterface;

use App\Repositories\Eloquent\OrderitemsRepository;
use App\Repositories\OrderitemsRepositoryInterface;

use App\Repositories\Eloquent\DrinksRepository;
use App\Repositories\DrinksRepositoryInterface;

use App\Repositories\Eloquent\TypedrinksRepository;
use App\Repositories\TypedrinksRepositoryInterface;

use App\Repositories\Eloquent\OrderSummaryRepository;
use App\Repositories\OrderSummaryRepositoryInterface;




class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(MasterRepositoryInterface::class, MasterRepository::class);
        $this->app->bind(RolesRepositoryInterface::class, RolesRepository::class);

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(OrdersRepositoryInterface::class, OrdersRepository::class);
        $this->app->bind(CustomersRepositoryInterface::class, CustomersRepository::class);
        $this->app->bind(OrderitemsRepositoryInterface::class, OrderitemsRepository::class);
        $this->app->bind(DrinksRepositoryInterface::class, DrinksRepository::class);
        $this->app->bind(TypedrinksRepositoryInterface::class, TypedrinksRepository::class);
        $this->app->bind(OrderSummaryRepositoryInterface::class, OrderSummaryRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
