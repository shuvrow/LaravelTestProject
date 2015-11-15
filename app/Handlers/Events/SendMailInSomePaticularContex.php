<?php

namespace App\Handlers\Events;

use App\Events\ThingWasDone;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailInSomePaticularContex
{
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        echo 'thing was done';
        dd('done');
    }

    /**
     * Handle the event.
     *
     * @param  ThingWasDone  $event
     * @return void
     */
    public function handle(ThingWasDone $event)
    {
        //
    }
}
