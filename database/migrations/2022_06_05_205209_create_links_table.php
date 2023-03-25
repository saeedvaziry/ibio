<?php

use App\LinkTypes\AbstractLinkType;
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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->enum('type', AbstractLinkType::getLinkTypes());
            $table->string('type');
            $table->json('data');
            $table->integer('sort');
            $table->string('thumbnail', '1000')->nullable();
            $table->string('thumbnail_disk')->nullable();
            $table->boolean('thumbnail_set_from_url')->default(0);
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('links');
    }
};
