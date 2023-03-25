<?php

namespace App\Models;

use App\Enums\ThemeBgType;
use App\Enums\ThemeButtonBgType;
use App\Enums\ThemeButtonRoundStyle;
use App\Enums\ThemeButtonShadowStyle;
use App\Enums\ThemeButtonThumbnailPosition;
use App\Enums\ThemeCoverLayout;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property ThemeBgType $bg_type
 * @property string $bg
 * @property string $text_color
 * @property ThemeButtonRoundStyle $button_round_style
 * @property ThemeButtonShadowStyle $button_shadow_style
 * @property string $button_bg
 * @property ThemeButtonBgType $button_bg_type
 * @property string $button_text_color
 * @property string $button_hover_bg
 * @property string $button_hover_text_color
 * @property ThemeButtonThumbnailPosition $button_thumbnail_position
 * @property string $button_border
 * @property string $button_border_color
 * @property ThemeCoverLayout $cover_layout
 * @property string $cover
 * @property string $font
 * @property string $avatar_bg
 * @property string $avatar_text_color
 * @property string $social_media_color
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property User $user
 */
class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'bg_type',
        'bg',
        'text_color',
        'button_round_style',
        'button_shadow_style',
        'button_bg_type',
        'button_bg',
        'button_text_color',
        'button_hover_bg',
        'button_hover_text_color',
        'button_thumbnail_position',
        'button_border',
        'button_border_color',
        'cover_layout',
        'cover',
        'font',
        'avatar_bg',
        'avatar_text_color',
        'social_media_color',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'bg_type' => ThemeBgType::class,
        'button_round_style' => ThemeButtonRoundStyle::class,
        'button_shadow_style' => ThemeButtonShadowStyle::class,
        'button_bg_type' => ThemeButtonBgType::class,
        'button_thumbnail_position' => ThemeButtonThumbnailPosition::class,
        'cover_layout' => ThemeCoverLayout::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getBgAttribute($value): string|array|null
    {
        return match ($this->bg_type->value) {
            ThemeBgType::COLOR => $value,
            ThemeBgType::GRADIENT => explode(',', $value),
            ThemeBgType::IMAGE => Storage::url($value),
            default => null,
        };
    }
}
