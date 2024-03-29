<?php

namespace App\Providers;

use App\Models\Attachment;
use App\Models\Post;
use App\Observers\AttachmentObserver;
use App\Observers\PostObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\Subscribed;
use App\Listeners\SendSubscriptionNotification;
use App\Listeners\SendPublishedNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Subscribed::class => [
            SendSubscriptionNotification::class,
        ],
        Published::class => [
            SendPublishedNotification::class
        ],
    ];

    protected $observers = [
        Post::class => PostObserver::class,
        Attachment::class => AttachmentObserver::class,
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
