<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Http\Resources\Counter as CounterResource;
use App\Http\Resources\Card as CardResource;
use App\Models\Category;
use App\Models\Postpaid;
use App\Models\prepaid;
use Response;

class CategoryController extends Controller
{

    // protected $categoryRepository;

    // public function __construct(CategoryRepository $categoryRepository)
    // {
    //     $this->categoryRepository = $categoryRepository;
    // }

    public function allCategories()
    {
        $category = Category::all();
        
        if($category != null){
            
            return Response::json([
            'success' => true,
            'message' => 'this is all categories',
            'data' => $category
              
             ],200);
         
        }else{
              
             return Response::json([
            'success' => false,
            'message' => 'There are no categories',
         ], 404);
            
        }
         
    }

    public function allcounters()
    {
        $counters = Postpaid::all();
        
        if($counters != null){
            
            return Response::json([
            'success' => true,
            'message' => 'this is all counters',
            'data' => CounterResource::collection($counters)
         ], 200);
         
        }else{
              
             return Response::json([
            'success' => false,
            'message' => 'There are no counters',
         ], 404);
            
        }
         
    }

    public function allcards()
    {
        $cards = prepaid::all();
        
        if($cards){
            
            return Response::json([
            'success' => true,
            'message' => 'this is all cards',
            'data' => CardResource::collection($cards) ], 200);
              
         
        }else{
              
             return Response::json([
            'success' => false,
            'message' => 'There are no cards',
         ], 404);
            
        }
         
    }
}
