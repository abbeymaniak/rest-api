<?php

namespace App\Models\Predictions;

class PredictionStatus
{
    const WIN = 'win';
    const LOST = 'lost';
    const UNRESOLVED = 'unresolved';

    const STATUSES = [
        self::WIN,
        self::LOST,
        self::UNRESOLVED
    ];
}
