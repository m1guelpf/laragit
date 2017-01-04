<?php

namespace App\Listeners;

use App\Events\UpdateNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationsUpdated
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
     * @param  UpdateNotification  $event
     * @return void
     */
    public function handle(UpdateNotification $event)
    {
        // Access notification using $event->notification
    }
}
