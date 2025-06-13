<?php

namespace App\Repositories\Eloquent;

use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;
use App\Repositories\CustomersRepositoryInterface;
use App\Models\Customers;

/**
 * Class CustomersRepository.
 */
class CustomersRepository extends BaseRepository implements CustomersRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Customers $model
     */
    public function __construct(Customers $model)
    {
        parent::__construct($model);
    }
}
