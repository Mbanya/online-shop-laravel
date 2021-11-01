<?php

namespace Domains\Customer\Models;

use Database\Factories\UserFactory;
use Domains\Customer\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'email',
        'password',
        'billing_id',
        'shipping_id'
    ];

    public function shipping(): BelongsTo
    {
        return  $this->belongsTo(Address::class,'shipping_id');
    }

    public function billing(): BelongsTo
    {
        return  $this->belongsTo(Address::class,'billing_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function addresses (): HasMany
    {
        return  $this->hasMany(Address::class,'user_id');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return UserFactory|Factory
     */
    protected static function newFactory(): UserFactory|Factory
    {
        return  new UserFactory();
    }
}
