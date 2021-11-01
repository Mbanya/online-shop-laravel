<?php
declare(strict_types=1);

namespace Domains\Customer\Models;

use Database\Factories\LocationFactory;
use Domains\Customer\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'uuid',
        'house',
        'street',
        'parish',
        'ward',
        'district',
        'county',
        'postcode',
        'country'
    ];

    public function addresses (): HasMany
    {
        return  $this->hasMany(Address::class,'location_id');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return LocationFactory|Factory
     */
    protected static function newFactory(): LocationFactory|Factory
    {
        return  new LocationFactory();
    }



}
