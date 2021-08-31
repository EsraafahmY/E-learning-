<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trackModel extends Model
{
    use HasFactory;

    protected  $table = "track";

    protected $fillable = [

        'teacherID',
        'title'

    ];
}
