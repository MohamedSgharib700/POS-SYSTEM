<?php

namespace App\Listeners;

use App\Events\Cards;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Transaction;

class Card
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
     * @param  Cards  $event
     * @return void
     */
    public function handle(Cards $event)
    {
        $card = $event->newcard ;
      
        if ($card){
            foreach($card as $card) {
                Transaction::create([
                'user_service_number' => $card->user_service_number,
                'name' => $card->name,
                'value' => $card->value,
                'status' => $card->status,
                'created_at' => $card->created_at,
                'updated_at' => $card->updated_at
              ]);
            }
        }
    }
}
