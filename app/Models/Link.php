<?php

namespace App\Models;

use App\Enums\MetricReferenceType;
use App\LinkTypes\LinkTypeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property array $data
 * @property int $sort
 * @property string $thumbnail
 * @property string $thumbnail_disk
 * @property string $thumbnail_url
 * @property bool $thumbnail_set_from_url
 * @property bool $is_active
 * @property User $user
 */
class Link extends AbstractModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'type',
        'data',
        'sort',
        'thumbnail',
        'thumbnail_disk',
        'is_active',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'data' => 'json',
        'sort' => 'integer',
        'is_active' => 'boolean',
        'thumbnail_set_from_url' => 'boolean',
    ];

    public static function booted()
    {
        static::updated(function (Link $link) {
            if ($link->thumbnail_disk == 'url') {
                dispatch(function () use ($link) {
                    $link->updateThumbnailFromUrl();
                });
            }
        });
        static::deleted(function (Link $link) {
            $link->metrics()->delete();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function type(): LinkTypeInterface
    {
        $link = 'App\\LinkTypes\\'.$this->type;

        return new $link($this);
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->thumbnail_disk) {
            if ($this->thumbnail_disk == 'url') {
                return $this->thumbnail;
            }

            return Storage::disk($this->thumbnail_disk)->url($this->thumbnail);
        }

        return $this->thumbnail;
    }

    public function metrics(): HasMany
    {
        return $this->hasMany(Metric::class, 'reference_id')
            ->where('reference_type', MetricReferenceType::LINK);
    }

    public function updateThumbnailFromUrl(string $url = null): void
    {
        $this->thumbnail = get_thumbnail_from_url($url ?? $this->data['url']);
        if ($this->thumbnail) {
            $this->thumbnail_disk = 'url';
        }
        $this->save();
    }
}
