<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lessonModel extends Model
{
    use HasFactory;

    protected  $table = "lessons";

    protected $fillable = [

        'title',
        'video',
        'trackID'

    ];
}
