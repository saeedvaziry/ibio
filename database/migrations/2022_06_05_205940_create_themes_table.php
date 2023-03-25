<?php

use App\Enums\ThemeBgType;
use App\Enums\ThemeButtonBgType;
use App\Enums\ThemeButtonRoundStyle;
use App\Enums\ThemeButtonShadowStyle;
use App\Enums\ThemeButtonThumbnailPosition;
use App\Enums\ThemeCoverLayout;
use App\Models\Theme;
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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->enum('bg_type', ThemeBgType::getValues());
            $table->string('bg');
            $table->string('text_color');
            $table->enum('button_round_style', ThemeButtonRoundStyle::getValues());
            $table->enum('button_shadow_style', ThemeButtonShadowStyle::getValues());
            $table->enum('button_bg_type', ThemeButtonBgType::getValues());
            $table->string('button_bg');
            $table->string('button_text_color');
            $table->string('button_hover_bg')->nullable();
            $table->string('button_hover_text_color')->nullable();
            $table->enum('button_thumbnail_position', ThemeButtonThumbnailPosition::getValues())->nullable();
            $table->string('button_border')->nullable();
            $table->string('button_border_color')->nullable();
            $table->enum('cover_layout', ThemeCoverLayout::getValues())->nullable();
            $table->string('font')->nullable();
            $table->string('avatar_bg');
            $table->string('avatar_text_color');
            $table->string('social_media_color');
            $table->timestamps();
        });

        // legacy
        Theme::query()->create([
            'name' => 'legacy',
            'bg_type' => ThemeBgType::COLOR,
            'bg' => '#ffffff',
            'text_color' => '#000000',
            'button_round_style' => ThemeButtonRoundStyle::ROUNDED,
            'button_shadow_style' => ThemeButtonShadowStyle::NONE,
            'button_bg_type' => ThemeButtonBgType::COLOR,
            'button_bg' => '#F1F5F9',
            'button_text_color' => '#000000',
            'button_thumbnail_position' => ThemeButtonThumbnailPosition::LEFT,
            'cover_layout' => ThemeCoverLayout::NONE,
            'font' => 'Vazirmatn',
            'avatar_bg' => '#E9D5FF',
            'avatar_text_color' => '#9333EA',
            'social_media_color' => '#000000',
        ]);

        // blue
        Theme::query()->create([
            'name' => 'blue',
            'bg_type' => ThemeBgType::GRADIENT,
            'bg' => '#47A1BD,#081C8C',
            'text_color' => '#ffffff',
            'button_round_style' => ThemeButtonRoundStyle::CIRCLE,
            'button_shadow_style' => ThemeButtonShadowStyle::NONE,
            'button_bg' => 'transparent',
            'button_text_color' => '#ffffff',
            'button_hover_bg' => '#ffffff',
            'button_hover_text_color' => '#081C8C',
            'button_thumbnail_position' => ThemeButtonThumbnailPosition::LEFT,
            'button_border' => '1px',
            'button_border_color' => '#ffffff',
            'cover_layout' => ThemeCoverLayout::NONE,
            'font' => 'Vazirmatn',
            'avatar_bg' => '#FFFFFF',
            'avatar_text_color' => '#102D92',
            'social_media_color' => '#FFFFFF',
        ]);

        // black
        Theme::query()->create([
            'name' => 'black',
            'bg_type' => ThemeBgType::COLOR,
            'bg' => '#000000',
            'text_color' => '#ffffff',
            'button_round_style' => ThemeButtonRoundStyle::CIRCLE,
            'button_shadow_style' => ThemeButtonShadowStyle::NONE,
            'button_bg' => 'transparent',
            'button_text_color' => '#ffffff',
            'button_hover_bg' => '#ffffff',
            'button_hover_text_color' => '#000000',
            'button_thumbnail_position' => ThemeButtonThumbnailPosition::LEFT,
            'button_border' => '1px',
            'button_border_color' => '#ffffff',
            'cover_layout' => ThemeCoverLayout::NONE,
            'font' => 'Vazirmatn',
            'avatar_bg' => '#FFFFFF',
            'avatar_text_color' => '#000000',
            'social_media_color' => '#FFFFFF',
        ]);

        // goldfinch
        Theme::query()->create([
            'name' => 'goldfinch',
            'bg_type' => ThemeBgType::COLOR,
            'bg' => '#E3D803',
            'text_color' => '#050B0F',
            'button_round_style' => ThemeButtonRoundStyle::NONE,
            'button_shadow_style' => ThemeButtonShadowStyle::LIGHT,
            'button_bg' => 'transparent',
            'button_text_color' => '#050B0F',
            'button_hover_bg' => 'transparent',
            'button_hover_text_color' => '#050B0F',
            'button_thumbnail_position' => ThemeButtonThumbnailPosition::LEFT,
            'button_border' => '2px',
            'button_border_color' => '#050B0F',
            'cover_layout' => ThemeCoverLayout::NONE,
            'font' => 'Vazirmatn',
            'avatar_bg' => '#050B0F',
            'avatar_text_color' => '#E3D803',
            'social_media_color' => '#050B0F',
        ]);

        // tanger
        Theme::query()->create([
            'name' => 'tanger',
            'bg_type' => ThemeBgType::GRADIENT,
            'bg' => '#FD5333,#FC7839',
            'text_color' => '#312519',
            'button_round_style' => ThemeButtonRoundStyle::ROUNDED,
            'button_shadow_style' => ThemeButtonShadowStyle::NORMAL,
            'button_bg' => 'transparent',
            'button_text_color' => '#312519',
            'button_hover_bg' => 'transparent',
            'button_hover_text_color' => '#312519',
            'button_thumbnail_position' => ThemeButtonThumbnailPosition::LEFT,
            'button_border' => '2px',
            'button_border_color' => '#312519',
            'cover_layout' => ThemeCoverLayout::NONE,
            'font' => 'Vazirmatn',
            'avatar_bg' => '#312519',
            'avatar_text_color' => '#FD5333',
            'social_media_color' => '#312519',
        ]);

        // flamingo
        Theme::query()->create([
            'name' => 'flamingo',
            'bg_type' => ThemeBgType::GRADIENT,
            'bg' => '#F1C9D7,#b63b8a',
            'text_color' => '#ffffff',
            'button_round_style' => ThemeButtonRoundStyle::CIRCLE,
            'button_shadow_style' => ThemeButtonShadowStyle::NORMAL,
            'button_bg' => 'transparent',
            'button_text_color' => '#ffffff',
            'button_hover_bg' => 'transparent',
            'button_hover_text_color' => '#ffffff',
            'button_thumbnail_position' => ThemeButtonThumbnailPosition::LEFT,
            'button_border' => '2px',
            'button_border_color' => '#ffffff',
            'cover_layout' => ThemeCoverLayout::NONE,
            'font' => 'Vazirmatn',
            'avatar_bg' => '#b63b8a',
            'avatar_text_color' => '#ffffff',
            'social_media_color' => '#ffffff',
        ]);

        // parrot
        Theme::query()->create([
            'name' => 'parrot',
            'bg_type' => ThemeBgType::GRADIENT,
            'bg' => '#77A90D,#E5AD13',
            'text_color' => '#ffffff',
            'button_round_style' => ThemeButtonRoundStyle::NONE,
            'button_shadow_style' => ThemeButtonShadowStyle::HARD,
            'button_bg' => 'transparent',
            'button_text_color' => '#ffffff',
            'button_hover_bg' => 'transparent',
            'button_hover_text_color' => '#ffffff',
            'button_thumbnail_position' => ThemeButtonThumbnailPosition::LEFT,
            'button_border' => '2px',
            'button_border_color' => '#ffffff',
            'cover_layout' => ThemeCoverLayout::NONE,
            'font' => 'Vazirmatn',
            'avatar_bg' => '#654D20',
            'avatar_text_color' => '#ffffff',
            'social_media_color' => '#ffffff',
        ]);

        // cotinga
        Theme::query()->create([
            'name' => 'cotinga',
            'bg_type' => ThemeBgType::GRADIENT,
            'bg' => '#8F115F,#282860',
            'text_color' => '#ffffff',
            'button_round_style' => ThemeButtonRoundStyle::ROUNDED,
            'button_shadow_style' => ThemeButtonShadowStyle::HARD,
            'button_bg' => 'transparent',
            'button_text_color' => '#ffffff',
            'button_hover_bg' => 'transparent',
            'button_hover_text_color' => '#ffffff',
            'button_thumbnail_position' => ThemeButtonThumbnailPosition::LEFT,
            'button_border' => '2px',
            'button_border_color' => '#ffffff',
            'cover_layout' => ThemeCoverLayout::NONE,
            'font' => 'Vazirmatn',
            'avatar_bg' => '#ffffff',
            'avatar_text_color' => '#8F115F',
            'social_media_color' => '#ffffff',
        ]);

        // cyan
        Theme::query()->create([
            'name' => 'cyan',
            'bg_type' => ThemeBgType::GRADIENT,
            'bg' => '#0891b2,#22d3ee',
            'text_color' => '#ffffff',
            'button_round_style' => ThemeButtonRoundStyle::CIRCLE,
            'button_shadow_style' => ThemeButtonShadowStyle::NONE,
            'button_bg' => 'transparent',
            'button_text_color' => '#ffffff',
            'button_hover_bg' => 'transparent',
            'button_hover_text_color' => '#ffffff',
            'button_thumbnail_position' => ThemeButtonThumbnailPosition::LEFT,
            'button_border' => '2px',
            'button_border_color' => '#ffffff',
            'cover_layout' => ThemeCoverLayout::NONE,
            'font' => 'Vazirmatn',
            'avatar_bg' => '#ffffff',
            'avatar_text_color' => '#0891b2',
            'social_media_color' => '#ffffff',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
};
