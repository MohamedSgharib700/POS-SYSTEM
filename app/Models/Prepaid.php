<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prepaid extends Model
{
    protected $table = "prepaid";

    protected $fillable = [
        'user_service_number', 'status' , 'name' , 'value' ,'category_id',  'created_at','updated_at'
    ];
}
