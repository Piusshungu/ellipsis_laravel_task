<?php

namespace App\Models;

use App\Http\Traits\SendResetNotification;
use App\Http\Traits\Uuid;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use  Uuid, Notifiable, SendResetNotification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function createdAt(): Attribute
    {
        return  Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('D d M Y'),
        );
    }
}
