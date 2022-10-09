<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";

    protected $fillable = [
        'user_service_number', 'status' , 'name' , 'value','category_id' ,'created_at','updated_at'
    ];
}
