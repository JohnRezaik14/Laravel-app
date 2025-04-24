<?php
namespace App\Providers;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Listeners\UpdateUserPostsCount;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     */
    protected $listen = [
        PostCreated::class => [
            UpdateUserPostsCount::class,
        ],
        PostDeleted::class => [
            UpdateUserPostsCount::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();
    }
}
