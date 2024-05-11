<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'admin';

    protected $fillable = ['email', 'username', 'password'];

    // public function events():belongsTo
    // {
    //     return $this->hasMany(Event::class);
    // }
}
