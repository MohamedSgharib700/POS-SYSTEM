<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = "balances" ; 

    protected $fillable = [ 'pos_id' , 'charge_value' , 'created_at' ,'updated_at' ,'supervisor' ];

    
    public function pos(){

        return $this->belongsTo('\App\Models\Pos' , 'pos_id');
    }

}
