<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; 
class Review extends Model
{
    protected $connection = 'mongodb'; 
    protected $collection = 'reviews'; 

    protected $fillable = [ 'user_id', 'name', 'rating', 'comment', 'date'];
    public $timestamps = false; 
}
