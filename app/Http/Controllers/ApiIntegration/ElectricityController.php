<?php

namespace App\Http\Controllers\ApiIntegration;

use App\Http\Controllers\Controller;
use App\Models\Postpaid;
use App\Models\Prepaid;
use App\Events\Transactions;
use Illuminate\Http\Request;

class ElectricityController extends Controller
{

  //This is the function of the counters

    public function getElectricityCounters()
    {  
        $data = curlRequest("http://192.168.8.115/electric/public/api/bills");
        if ($data->success) {
          foreach($data->data as $data) {
            Postpaid::create([
              'user_service_number' => $data->number,
              'name' => $data->name,
              'value' => $data->value,
              'status' => $data->status,
              'created_at' => $data->created_at,
              'updated_at' => $data->updated_at,
            ]);
          }
          
          return 'done';
        } else {
            return $data->message;
        }
    }

    //end counters function


    //This is the function of the cards

    public function getElectricityCards()
    {
        $data = curlRequest("http://192.168.8.115/electric/public/api/cards");
        if ($data->success) {
          foreach($data->data as $data) {
            Prepaid::create([
              'user_service_number' => $data->number,
              'name' => $data->name,
              'created_at' => $data->created_at,
              'updated_at' => $data->updated_at,
            ]);
          }
          return 'done';
        } else {
            return $data->message;
        }
    }

    //end cards function

}
