<?php
namespace App\Listeners;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Models\User;

class UpdateUserPostsCount
{
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
    public function handle($event): void
    {
        if ($event instanceof PostCreated) {
            $event->post->user()->increment('posts_count');
        }
        if ($event instanceof PostDeleted) {
            $event->post->user()->decrement('posts_count');
        }
    }
}
