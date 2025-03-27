<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'genre',
        'pays',
        'firstname',
        'lastname',
        'email',
        'phone',
        'post',
        'created_at',
        'updated_at',
    ];
}