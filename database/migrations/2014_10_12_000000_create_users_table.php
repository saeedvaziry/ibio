<?php

use App\Enums\SocialLinksPosition;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('old_id')->unique()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('theme_id')->nullable();
            $table->string('username')->nullable()->unique();
            $table->longText('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->json('social_links')->nullable();
            $table->enum('social_links_position', SocialLinksPosition::getValues())
                ->default(SocialLinksPosition::BOTTOM);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
