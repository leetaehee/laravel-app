<?php

namespace App\Listeners;

use App\Events\Published;
use App\Notifications\Published as PublishedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendPublishedNotification implements ShouldQueue
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
    public function handle(Published $event): void
    {
        Notification::send($event->subscribers, new PublishedNotification($event->post));
    }
}
