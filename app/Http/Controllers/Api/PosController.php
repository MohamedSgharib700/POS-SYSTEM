<?php

namespace App\Http\Controllers\Api;

use App\Models\Pos;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function allPos()
    {
        $devices = Pos::all();
        
        if($devices){
            
            return Response::json([
            'success' => true,
            'message' => 'this is all Devices (pos)',
            'data' => $devices
              
             ],200);
         
        }else{
              
             return Response::json([
            'success' => false,
            'message' => 'There are no Devices (pos)',
         ], 404);
            
        }
         
    }
}
