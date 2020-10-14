<?php

namespace App\Http\Requests\Predictions;

use App\Http\Requests\BaseFormRequest;
use App\Models\Predictions\PredictionStatus;
use Illuminate\Validation\Rule;

class UpdatePredictionStatusRequest extends BaseFormRequest
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
            'status' => ['required', Rule::in(PredictionStatus::STATUSES)]
        ];
    }
}
