<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizContent extends Model
{
    use HasFactory;
    protected $table = 'quiz_contents';
    public $timestamps = false;
}
