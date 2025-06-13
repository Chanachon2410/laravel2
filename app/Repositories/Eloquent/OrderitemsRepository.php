<?php

namespace App\Repositories\Eloquent;

use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;
use App\Repositories\OrderitemsRepositoryInterface;
use App\Models\Orderitems;

/**
 * Class OrderitemsRepository.
 */
class OrderitemsRepository extends BaseRepository implements OrderitemsRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Orderitems $model
     */
    public function __construct(Orderitems $model)
    {
        parent::__construct($model);
    }
}
