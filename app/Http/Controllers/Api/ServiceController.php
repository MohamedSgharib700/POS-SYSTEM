<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Response;

class ServiceController extends Controller
{
    public function allServices()
    {
        $services = Service::all();
        
        if($services){
            
            return Response::json([
            'success' => true,
            'message' => 'this is all services',
            'data' => $services
              
             ],200);
         
        }else{
              
             return Response::json([
            'success' => false,
            'message' => 'There are no services',
         ], 404);
            
        }
         
    }
}
