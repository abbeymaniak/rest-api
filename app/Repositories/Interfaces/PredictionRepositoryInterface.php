<?php

namespace App\Repositories\Interfaces;

interface PredictionRepositoryInterface
{
    /**
     *  Get all prediction records
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Create a new prediction record
     *
     * @param $attributes
     *
     * @return mixed
     */
    public function create($attributes);

    /**
     * Update status of the prediction
     *
     * @param $id
     * @param $status
     *
     * @return mixed
     */
    public function updateStatus($id, $status);
}
