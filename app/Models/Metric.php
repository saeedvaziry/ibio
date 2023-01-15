<?php

namespace App\Models;

use App\Enums\Device;
use App\Enums\MetricReferenceType;
use App\Enums\MetricType;
use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property MetricReferenceType $reference_type
 * @property int $reference_id
 * @property MetricType $type
 * @property Device $device
 * @property string $country
 * @property string $ip
 * @property string $user_agent
 * @property string $referer
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 */
class Metric extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_type',
        'reference_id',
        'type',
        'device',
        'country',
        'ip',
        'user_agent',
        'referer',
    ];

    protected $casts = [
        'reference_type' => MetricReferenceType::class,
        'reference_id' => 'integer',
        'type' => MetricType::class,
        'device' => Device::class,
    ];
}
