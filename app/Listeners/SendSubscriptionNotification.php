<?php

namespace App\Listeners;

use App\Events\Subscribed;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Subscribed as SubscribedNotification;

class SendSubscriptionNotification implements ShouldQueue
{
    public $queue = 'listeners';

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Subscribed $event): void
    {
        $event->blog->user->notify(new SubscribedNotification($event->user, $event->blog));
    }
}
