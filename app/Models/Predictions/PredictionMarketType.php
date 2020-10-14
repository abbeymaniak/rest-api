<?php

namespace App\Models\Predictions;

class PredictionMarketType
{
    const THREE_WAY_RESULT = '1x2';
    const CORRECT_SCORE = 'correct_score';

    const THREE_WAY_RESULT_VALUE_1 = '1';
    const THREE_WAY_RESULT_VALUE_2 = '2';
    const THREE_WAY_RESULT_VALUE_X = 'X';

    const TYPES = [
        self::THREE_WAY_RESULT,
        self::CORRECT_SCORE
    ];

    const THREE_WAY_RESULT_VALUES = [
        self::THREE_WAY_RESULT_VALUE_1,
        self::THREE_WAY_RESULT_VALUE_2,
        self::THREE_WAY_RESULT_VALUE_X
    ];
}
