<?php

namespace App\Listeners;

use App\Events\Counters;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Storage ;
use App\Models\Transaction;

class Counter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Transactions  $event
     * @return void
     */
    public function handle(Counters $event)
    {
        // Storage::put('testNewData.txt',$event->newdata);
      $counter = $event->newcounter ;
      

        if ($counter){
            foreach($counter as $counter) {
              Transaction::create([
                'user_service_number' => $counter->user_service_number,
                'name' => $counter->name,
                'value' => $counter->value,
                'status' => $counter->status,
                'pos_id' => $counter->pos_id,
                'created_at' => $counter->created_at,
                'updated_at' => $counter->updated_at
              ]);
            }
        }
        
    }
}
