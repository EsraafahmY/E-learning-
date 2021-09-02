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

    public function track_relation()
    {

        return  $this->belongsTo('App\Models\trackModel', 'trackID', 'ID');
    }
    public function video_relation()
    {

        return  $this->belongsTo('App\Models\Media', 'video', 'id');
    }
    public function questions()
    {

        return $this->hasMany('App\Models\questionModel', 'lessonID', 'ID');
    }
}
