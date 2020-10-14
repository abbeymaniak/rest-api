<?php

namespace App\Services\Interfaces;

use App\Http\Requests\Predictions\CreatePredictionRequest;
use App\Http\Requests\Predictions\UpdatePredictionStatusRequest;

interface PredictionServiceInterface
{
    /**
     * Get all predictions
     *
     * @return mixed
     */
    public function index();

    /**
     * Create a prediction
     *
     * @param CreatePredictionRequest $request
     * @return mixed
     */
    public function create(CreatePredictionRequest $request);

    /**
     * Update status of the prediction
     *
     * @param UpdatePredictionStatusRequest $request
     * @param $id
     * @return mixed
     */
    public function updateStatus(UpdatePredictionStatusRequest $request, $id);
}
