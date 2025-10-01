<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'posts'; // Use 'posts' table
    protected $fillable = ['name', 'email', 'image']; // Allow mass assignment
}
