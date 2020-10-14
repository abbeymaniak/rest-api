<?php

namespace App\Rules;

use App\Models\Predictions\PredictionMarketType;
use Illuminate\Contracts\Validation\Rule;

class TypeOfPrediction implements Rule
{
    private $market_type;

    /**
     * TypeOfPrediction constructor.
     *
     * @param $market_type
     */
    public function __construct($market_type)
    {
        $this->market_type = $market_type;
    }

    /**
     * Check if prediction value correspond to its type
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool|int
     */
    public function passes($attribute, $value)
    {
        if ($this->market_type == PredictionMarketType::THREE_WAY_RESULT) {
            return in_array($value, PredictionMarketType::THREE_WAY_RESULT_VALUES);
        } else {
            return preg_match('/^[0-9]+:[0-9]+$/', $value);
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Prediction value does not correspond to its type.';
    }
}
