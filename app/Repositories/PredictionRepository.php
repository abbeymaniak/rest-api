<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PredictionRepositoryInterface;
use App\Models\Predictions\Prediction;

class PredictionRepository implements PredictionRepositoryInterface
{
    /**
     * @var Prediction
     */
    protected $prediction;

    /**
     * PredictionRepository constructor.
     *
     * @param Prediction $prediction
     */
    public function __construct(Prediction $prediction)
    {
        $this->prediction = $prediction;
    }

    /**
     * Get all prediction records
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->prediction->get();
    }

    /**
     * Create a new prediction record
     *
     * @param $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        return $this->prediction->create($attributes);
    }

    /**
     * Update status of the prediction
     *
     * @param $id
     * @param $status
     * @return mixed
     */
    public function updateStatus($id, $status)
    {
        return $this->prediction->find($id)->update([
            'status' => $status
        ]);
    }

}
