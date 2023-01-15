<?php

use App\Enums\Device;
use App\Enums\MetricReferenceType;
use App\Enums\MetricType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->id();
            $table->enum('reference_type', MetricReferenceType::getValues());
            $table->unsignedBigInteger('reference_id');
            $table->enum('type', MetricType::getValues());
            $table->enum('device', Device::getValues());
            $table->string('country')->nullable();
            $table->string('ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('referer', 1000)->nullable();
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
        Schema::dropIfExists('metrics');
    }
};
