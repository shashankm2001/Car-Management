<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    use HasFactory;
     
//  This is used to check the contents that i can fill in database

    protected $fillable = ['name','brand','color','year'];

    
     
}

