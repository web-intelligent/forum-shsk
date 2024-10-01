<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'birth_day',
        'phone',
        'telegram',
        'category',
        'seat',
        'standing',
        'rank',
        'awards',
        'org_name',
        'address',
        'region',
        'form',
        'location',
        'password',
        'ip_address',
        'competition_member'
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function sendPasswordResetNotification($token): void
    {
//        $url = 'https://example.com/reset-password?token='.$token;
//
//        $this->notify(new ResetPasswordNotification($url));

        $url = url(route('password.reset', [
            'token' => $token,
            'email' => $this->getEmailForPasswordReset()

        ], false));

        $this->notify(new ResetPasswordNotification($url));

    }

}
