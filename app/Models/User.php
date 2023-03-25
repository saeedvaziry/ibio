<?php

namespace App\Models;

use App\Enums\MetricReferenceType;
use App\Enums\SocialLinksPosition;
use App\Traits\HasProfilePhoto;
use DateTimeImmutable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;

/**
 * @property int $id
 * @property int $old_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property DateTimeImmutable $email_verified_at
 * @property int $theme_id
 * @property string $username
 * @property string $bio
 * @property string $avatar
 * @property string $cover
 * @property array $social_links
 * @property SocialLinksPosition $social_links_position
 * @property string $url
 * @property Theme $theme
 * @property Link[] $links
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 */
class User extends AbstractModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, HasFactory;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;
    use Notifiable;

    protected $fillable = [
        'id',
        'old_id',
        'name',
        'email',
        'password',
        'email_verified_at',
        'theme_id',
        'username',
        'bio',
        'avatar',
        'cover',
        'social_links',
        'social_links_position',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'id' => 'integer',
        'old_id' => 'integer',
        'email_verified_at' => 'datetime',
        'social_links' => 'json',
        'social_links_position' => SocialLinksPosition::class,
    ];

    public static function booted()
    {
        static::deleted(function (User $user) {
            $user->links()->delete();
            $user->themes()->delete();
            $user->metrics()->delete();
        });
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function themes(): hasMany
    {
        return $this->hasMany(Theme::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function socialLinks(): HasMany
    {
        return $this->links()->where('type', 'Social');
    }

    public function url(): string
    {
        return url('/'.$this->username);
    }

    public function avatarUrl(): string
    {
        return $this->avatar ? Storage::disk($this->profilePhotoDisk())->url($this->avatar) : '';
    }

    public function metrics(): HasMany
    {
        return $this->hasMany(Metric::class, 'reference_id')
            ->where('reference_type', MetricReferenceType::PAGE);
    }

    public function linkMetrics(): HasManyThrough
    {
        return $this->hasManyThrough(Metric::class, Link::class, 'reference_id')
            ->where('reference_type', MetricReferenceType::LINK);
    }
}
