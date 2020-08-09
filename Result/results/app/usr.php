<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usr extends Model
{
    protected $table='usr';
    protected $fillable=['name','rno','address'];
    protected $PrimaryKey='sid';

    
}
