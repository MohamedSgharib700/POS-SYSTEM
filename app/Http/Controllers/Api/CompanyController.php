<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Response;

class CompanyController extends Controller
{
    public function allCompanies()
    {
        $companies = Company::all();
        
        if($companies){
            
            return Response::json([
            'success' => true,
            'message' => 'this is all companies',
            'data' => $companies
              
             ],200);
         
        }else{
              
             return Response::json([
            'success' => false,
            'message' => 'There are no companies',
         ], 404);
            
        }
         
    }
}
