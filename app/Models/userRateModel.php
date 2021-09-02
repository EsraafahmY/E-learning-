<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userRateModel extends Model
{
    use HasFactory;

    protected  $table = "user_rate";

    protected $fillable = [
        'userID',
        'teacherID',
        'rate'

    ];

}
