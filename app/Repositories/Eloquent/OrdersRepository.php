<?php

namespace App\Repositories\Eloquent;

use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;
use App\Repositories\OrdersRepositoryInterface;
use App\Models\Orders;

/**
 * Class OrdersRepository.
 */
class OrdersRepository extends MasterRepository implements OrdersRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Orders $model
     */
    public function __construct(Orders $model)
    {
        parent::__construct($model);
    }
    public function findWithDrinks($orderId)
    {
        return $this->model->with('drinks')->find($orderId);
    }
    public function findById($id)
    {
        return $this->model->find($id);
    }
}
