<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'is_athena_user',
        'status',
        'google_id',
        'condition_utilisation',
        'username',
        'diploma_id',
        'verify_token',
        'social',
        'fcm',
        'image',
        'disabled_reason',
        'phone',
        'is_email',
        'site_web',
        'post',
        'points',
        'page_pro',
        'career',
        'niveau',
        'networks',
        'responsible_id',
        'name',
        'pays',
        'genre',
        'description',
        'keywords',
        'history',
        'team',
        'couverture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'verify_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_athena_user' => 'boolean',
        'condition_utilisation' => 'boolean',
        'is_email' => 'boolean',
        'page_pro' => 'boolean',
        'networks' => 'array',
        'team' => 'array',
    ];

   /* public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }*/
}