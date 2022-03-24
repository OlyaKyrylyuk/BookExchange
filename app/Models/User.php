<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'city',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function books()
    {
        return $this->hasOne(Book::class);
    }
    public function exchanges()
    {
        return $this->hasMany(Exchange::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'username'
            ]
        ];
    }
}
