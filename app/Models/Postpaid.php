<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postpaid extends Model
{
    protected $table = "postpaid";

    protected $fillable = [
        'user_service_number', 'status' , 'name' , 'value' ,'category_id','created_at','updated_at'
    ];
}
