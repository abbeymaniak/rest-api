<?php

use App\Models\Predictions\PredictionMarketType;
use App\Models\Predictions\PredictionStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('event_id');
            $table->enum('market_type', PredictionMarketType::TYPES);
            $table->string('prediction');
            $table->enum('status', PredictionStatus::STATUSES)
                ->default(PredictionStatus::UNRESOLVED);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predictions');
    }
}
