<?php

namespace App\Repositories\Eloquent;

use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;
use App\Repositories\OrderSummaryRepositoryInterface;
use App\Models\OrderSummary;

/**
 * Class OrderSummaryRepository.
 */
class OrderSummaryRepository extends MasterRepository implements OrderSummaryRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param OrderSummary $model
     */
    public function __construct(OrderSummary $model)
    {
        parent::__construct($model);
    }
}
