<?php

namespace App\Repositories\Eloquent;

use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;
use App\Repositories\TypedrinksRepositoryInterface;
use App\Models\Typedrinks;

/**
 * Class TypedrinksSeederRepository.
 */
class TypedrinksRepository extends BaseRepository implements TypedrinksRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param TypedrinksSeeder $model
     */
    public function __construct(Typedrinks $model)
    {
        parent::__construct($model);
    }
}
