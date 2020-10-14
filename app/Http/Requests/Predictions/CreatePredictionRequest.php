<?php

namespace App\Http\Requests\Predictions;

use App\Http\Requests\BaseFormRequest;
use App\Models\Predictions\PredictionMarketType;
use App\Rules\TypeOfPrediction;
use Illuminate\Validation\Rule;

class CreatePredictionRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_id' => 'required|integer|min:0',
            'market_type' => ['required', Rule::in(PredictionMarketType::TYPES)],
            'prediction' => ['required', new TypeOfPrediction($this->market_type)]
        ];
    }
}
