<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questionModel extends Model
{
    use HasFactory;
    protected  $table = "questions";

    protected $fillable = [

        'question',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'right_answer',
        'lessonID'

    ];
}
