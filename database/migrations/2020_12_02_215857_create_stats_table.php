<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('statable_id');
            $table->string('statable_type');
            $table->string('device')->nullable();
            $table->string('os')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->string('country')->nullable();
            $table->boolean('is_mobile')->nullable();
            $table->boolean('is_desktop')->nullable();
            $table->boolean('is_tablet')->nullable();
            $table->longText('user_agent')->nullable();
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
        Schema::dropIfExists('stats');
    }
}
