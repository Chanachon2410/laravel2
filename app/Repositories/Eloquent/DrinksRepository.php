<?php

namespace App\Repositories\Eloquent;

use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;
use App\Repositories\DrinksRepositoryInterface;
use App\Models\Drinks;

/**
 * Class DrinksRepository.
 */
class DrinksRepository extends BaseRepository implements DrinksRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Drinks $model
     */
    public function __construct(Drinks $model)
    {
        parent::__construct($model);
    }
}
