<?php

namespace App\Services;

use App\Services\Interfaces\PredictionServiceInterface;
use App\Http\Requests\Predictions\CreatePredictionRequest;
use App\Http\Requests\Predictions\UpdatePredictionStatusRequest;
use App\Repositories\PredictionRepository;

class PredictionService implements PredictionServiceInterface
{
    /**
     * @var PredictionRepository
     */
    protected $predictionRepository;

    /**
     * PredictionService constructor.
     *
     * @param PredictionRepository $predictionRepository
     */
    public function __construct(PredictionRepository $predictionRepository)
    {
        $this->predictionRepository = $predictionRepository;
    }

    /**
     * Get all predictions
     *
     * @return mixed
     */
    public function index()
    {
        return $this->predictionRepository->getAll();
    }

    /**
     * Create a prediction
     *
     * @param CreatePredictionRequest $request
     * @return mixed
     */
    public function create(CreatePredictionRequest $request)
    {
        $attributes = $request->only(['event_id', 'market_type', 'prediction']);

        return $this->predictionRepository->create($attributes);
    }

    /**
     * Update status of the prediction
     *
     * @param UpdatePredictionStatusRequest $request
     * @param $id
     * @return mixed
     */
    public function updateStatus(UpdatePredictionStatusRequest $request, $id)
    {
        $status = $request->status;

        return $this->predictionRepository->updateStatus($id, $status);
    }

}
