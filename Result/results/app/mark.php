<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mark extends Model
{
    protected $table='mark';
    protected $fillable=['student_id','subject','marks'];
    protected $PrimaryKey='mid';
    
}
