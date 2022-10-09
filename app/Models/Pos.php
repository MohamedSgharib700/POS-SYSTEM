<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    protected $table = "pos";

    protected $fillable = [
        'user_id', 'machine_code' , 'image' , 'active'
    ];  


    public function user()
    {
        return $this->belongsTo('\App\Models\User' , 'user_id' );
    }

    public function balances()
    {
        return $this->hasMany('\App\Models\Balance' , 'pos_id' );
    }


}
