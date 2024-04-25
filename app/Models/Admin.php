<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'admin';

    protected $fillable = ['email', 'username', 'password'];
}
