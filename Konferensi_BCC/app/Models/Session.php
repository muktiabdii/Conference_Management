<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table = 'session';

    protected $fillable = [
        'title', 'description', 'author', 'start_time', 'end_time', 'capacity'
    ];
}
