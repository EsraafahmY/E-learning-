<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    use HasFactory;

    protected  $table = "users";

    protected $fillable = ['Fname' , 'Lname' , 'email','password','phone' ,'address' ,'roleID' ,'img_dir' ,'job' ,'education'];
 
}
