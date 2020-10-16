<?php

namespace App\Http\Controllers\Predictions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Predictions\CreatePredictionRequest;
use App\Http\Requests\Predictions\UpdatePredictionStatusRequest;
use App\Http\Resources\PredictionCollection;
use App\Models\Predictions\Prediction;
use App\Services\PredictionService;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PredictionController extends Controller
{
    /**
     * @var PredictionService
     */
    protected $predictionService;

    /**
     * PredictionController constructor.
     * @param PredictionService $predictionService
     */
    public function __construct(PredictionService $predictionService)
    {
        $this->predictionService = $predictionService;
    }

    /**
     *  Get all predictions
     *
     * @return PredictionCollection
     */
    public function index()
    {
        try {
            $data = $this->predictionService->index();
            Log::info('Prediction records requested successfully');
        } catch (\Throwable $exception) {
            report($exception);
            throw new HttpException(500, $exception->getMessage());
        }
        return new PredictionCollection($data);
    }

    /**
     * Create a prediction
     *
     * @param CreatePredictionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreatePredictionRequest $request)
    {
        try {
            $prediction = $this->predictionService->create($request);
            Log::info('New prediction record created successfully', ['prediction' => $prediction]);
        } catch (\Throwable $exception) {
            report($exception);
            throw new HttpException(500, $exception->getMessage());
        }
        return response()->json(null, 204);
    }

    /**
     * Update status of the prediction
     *
     * @param UpdatePredictionStatusRequest $request
     * @param Prediction $prediction
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(UpdatePredictionStatusRequest $request, Prediction $prediction)
    {
        try {
            $this->predictionService->updateStatus($request, $prediction->id);
            Log::info('Prediction status updated successfully', ['prediction' => $prediction]);
        } catch (\Throwable $exception) {
            report($exception);
            throw new HttpException(500, $exception->getMessage());
        }
        return response()->json(null, 204);
    }

}
