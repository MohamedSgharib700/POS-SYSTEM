<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $table = "api_counters";

    protected $fillable = [
        'number', 'name' , 'categoryId' , 'value' , 'status' 
    ];

}
