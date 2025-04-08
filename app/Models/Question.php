<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'quiz_id',
        'question_text',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'correct_option'
    ];
}
