<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'photo','slug','author', 'user_id', 'genre_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function exchanges()
    {
        return $this->hasMany(Exchange::class);
    }
}
