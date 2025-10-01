<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    //
    protected $table = 'posts';
    protected $fileable = ['name','email','image'];
}
