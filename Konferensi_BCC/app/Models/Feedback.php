<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Feedback extends Model
{
    use HasFactory;


    protected $table = 'feedbacks';

    
    protected $fillable = [
        'commenter', 'session_id', 'feedback'
    ];
}
