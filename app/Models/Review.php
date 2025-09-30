<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // correct new MongoDB model

class Review extends Model
{
    protected $connection = 'mongodb'; // the MongoDB connection in config/database.php
    protected $collection = 'reviews'; // MongoDB collection name

    protected $fillable = [ 'user_id', 'name', 'rating', 'comment', 'date'];
    public $timestamps = false; // if you are not using created_at/updated_at
}
