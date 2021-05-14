<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $art Артикул
 * @property string $name
 * @property string $status
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static Builder|Product available()
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static Builder|Product query()
 * @method static Builder|Product whereArt($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereData($value)
 * @method static Builder|Product whereDeletedAt($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereStatus($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_AVAILABLE = "available";
    const STATUS_UNAVAILABLE = "unavailable";

    protected $casts = [
        'data' => 'array',
    ];

    protected $fillable = [
        'art',
        'name',
        'status',
    ];

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_AVAILABLE);
    }

    public static function getStatusList(): array
    {
        return [
            self::STATUS_AVAILABLE => 'Available',
            self::STATUS_UNAVAILABLE => 'Unavailable',
        ];
    }
}
